#!/bin/bash

# =============================================================================
# Laravel Server Setup Script for Ubuntu VPS (Hostinger)
# Domain: devomar.me
# =============================================================================

set -e

DOMAIN="devomar.me"
APP_DIR="/var/www/devomar"
DB_NAME="devomar"
DB_USER="devomar"

echo "==========================================="
echo "Laravel Server Setup for $DOMAIN"
echo "==========================================="

# Update system
echo "Updating system packages..."
apt update && apt upgrade -y

# Install essential packages
echo "Installing essential packages..."
apt install -y curl git unzip software-properties-common ufw

# Add PHP repository
echo "Adding PHP repository..."
add-apt-repository -y ppa:ondrej/php
apt update

# Install PHP 8.4 with extensions
echo "Installing PHP 8.4..."
apt install -y php8.4-fpm php8.4-cli php8.4-common php8.4-mysql php8.4-zip \
    php8.4-gd php8.4-mbstring php8.4-curl php8.4-xml php8.4-bcmath \
    php8.4-intl php8.4-readline php8.4-imagick php8.4-redis

# Install MySQL
echo "Installing MySQL..."
apt install -y mysql-server

# Install Nginx
echo "Installing Nginx..."
apt install -y nginx

# Install Node.js (LTS)
echo "Installing Node.js..."
curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -
apt install -y nodejs

# Install Composer
echo "Installing Composer..."
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Install Supervisor (for queue workers)
echo "Installing Supervisor..."
apt install -y supervisor

# Install Certbot for SSL
echo "Installing Certbot..."
apt install -y certbot python3-certbot-nginx

# Configure firewall
echo "Configuring firewall..."
ufw allow OpenSSH
ufw allow 'Nginx Full'
ufw --force enable

# Create web directory
echo "Creating web directory..."
mkdir -p $APP_DIR
chown -R www-data:www-data /var/www

# Configure PHP-FPM
echo "Configuring PHP-FPM..."
sed -i 's/upload_max_filesize = .*/upload_max_filesize = 64M/' /etc/php/8.4/fpm/php.ini
sed -i 's/post_max_size = .*/post_max_size = 64M/' /etc/php/8.4/fpm/php.ini
sed -i 's/memory_limit = .*/memory_limit = 512M/' /etc/php/8.4/fpm/php.ini

systemctl restart php8.4-fpm

# Create Nginx config
echo "Creating Nginx configuration..."
cat > /etc/nginx/sites-available/devomar << 'EOF'
server {
    listen 80;
    listen [::]:80;
    server_name devomar.me www.devomar.me;
    root /var/www/devomar/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOF

# Enable site
ln -sf /etc/nginx/sites-available/devomar /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default
nginx -t && systemctl reload nginx

# Create MySQL database and user
echo ""
echo "==========================================="
echo "MySQL Setup"
echo "==========================================="
echo "Please enter a password for the MySQL user '$DB_USER':"
read -s DB_PASSWORD

mysql -e "CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -e "CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';"
mysql -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

echo "Database '$DB_NAME' and user '$DB_USER' created."

# Create deploy user
echo ""
echo "Creating deploy user..."
useradd -m -s /bin/bash deploy || true
usermod -aG www-data deploy
chown -R deploy:www-data $APP_DIR
chmod -R 775 $APP_DIR

# Generate SSH key for GitHub Actions to connect
echo ""
echo "Generating SSH key for GitHub Actions..."
mkdir -p /home/deploy/.ssh
chown deploy:deploy /home/deploy/.ssh
chmod 700 /home/deploy/.ssh
sudo -u deploy ssh-keygen -t ed25519 -f /home/deploy/.ssh/github_actions -N "" -C "github-actions@devomar.me"

# Add to authorized_keys
cat /home/deploy/.ssh/github_actions.pub >> /home/deploy/.ssh/authorized_keys
chmod 600 /home/deploy/.ssh/authorized_keys
chown deploy:deploy /home/deploy/.ssh/authorized_keys

echo ""
echo "==========================================="
echo "IMPORTANT: SSH Key for GitHub Actions"
echo "==========================================="
echo ""
echo "Add this PRIVATE key as 'VPS_SSH_KEY' secret in GitHub:"
echo "(Settings > Secrets and variables > Actions > New repository secret)"
echo ""
cat /home/deploy/.ssh/github_actions
echo ""

# Create supervisor config for queue worker
echo "Creating supervisor configuration..."
cat > /etc/supervisor/conf.d/devomar-worker.conf << 'EOF'
[program:devomar-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/devomar/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/devomar/storage/logs/worker.log
stopwaitsecs=3600
EOF

# Allow deploy user to restart supervisor without password
echo "deploy ALL=(ALL) NOPASSWD: /usr/bin/supervisorctl" >> /etc/sudoers.d/deploy

supervisorctl reread
supervisorctl update

echo ""
echo "==========================================="
echo "Setup Complete!"
echo "==========================================="
echo ""
echo "NEXT STEPS:"
echo ""
echo "1. Copy the PRIVATE key shown above and add it as a GitHub secret:"
echo "   Repository > Settings > Secrets and variables > Actions > New repository secret"
echo "   Name: VPS_SSH_KEY"
echo ""
echo "2. Create a GitHub Personal Access Token (for private repo access):"
echo "   GitHub > Settings > Developer settings > Personal access tokens > Generate new token"
echo "   Give it 'repo' scope"
echo "   Add as GitHub secret: DEPLOY_TOKEN"
echo ""
echo "3. Add these GitHub secrets:"
echo "   - VPS_HOST: Your VPS IP address"
echo "   - VPS_USERNAME: deploy"
echo "   - VPS_SSH_KEY: (the private key shown above)"
echo "   - DEPLOY_TOKEN: (your GitHub personal access token)"
echo ""
echo "4. Clone your repo (run as deploy user):"
echo "   su - deploy"
echo "   git clone https://github.com/devOMAR-2/portfolio.git $APP_DIR"
echo "   (Enter your GitHub username and personal access token when prompted)"
echo ""
echo "5. Create your .env file:"
echo "   cp $APP_DIR/.env.example $APP_DIR/.env"
echo "   nano $APP_DIR/.env"
echo ""
echo "6. Set these values in your .env:"
echo "   APP_ENV=production"
echo "   APP_DEBUG=false"
echo "   APP_URL=https://devomar.me"
echo "   DB_CONNECTION=mysql"
echo "   DB_DATABASE=$DB_NAME"
echo "   DB_USERNAME=$DB_USER"
echo "   DB_PASSWORD=<your_password>"
echo ""
echo "7. Install dependencies:"
echo "   cd $APP_DIR"
echo "   composer config http-basic.packages.filamentphp.com YOUR_FILAMENT_USERNAME YOUR_FILAMENT_LICENSE"
echo "   composer install --no-dev --optimize-autoloader"
echo "   npm ci && npm run build"
echo ""
echo "8. Set up Laravel:"
echo "   php artisan key:generate"
echo "   php artisan migrate --force"
echo "   php artisan storage:link"
echo ""
echo "9. Set permissions:"
echo "   exit  # Exit back to root"
echo "   chown -R www-data:www-data $APP_DIR/storage $APP_DIR/bootstrap/cache"
echo "   chmod -R 775 $APP_DIR/storage $APP_DIR/bootstrap/cache"
echo ""
echo "10. Set up SSL with Let's Encrypt:"
echo "    certbot --nginx -d devomar.me -d www.devomar.me"
echo ""
echo "11. Start the supervisor workers:"
echo "    supervisorctl start devomar-worker:*"
echo ""
echo "Done! Your site should now be live at https://devomar.me"
echo "Push to main branch to trigger automatic deployments."
echo ""
