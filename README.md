# Omar Al-Farraj - Portfolio

Personal portfolio website for Omar Al-Farraj, a Certified Senior Laravel Developer based in Riyadh, Saudi Arabia.

## Tech Stack

- **Backend:** Laravel 12, PHP 8.4
- **Admin Panel:** Filament 5
- **Frontend:** Blade, Livewire 4, Alpine.js
- **Styling:** Tailwind CSS 4
- **Database:** MySQL
- **Testing:** Pest 4

## Features

- Responsive portfolio showcasing projects
- Contact form with validation and rate limiting
- Admin panel for managing projects and messages
- Media library with automatic image conversions
- Custom error pages (404, 500, etc.)
- Security headers middleware
- Dark/Light mode support

## Requirements

- PHP 8.4+
- Composer
- Node.js & NPM
- MySQL

## Installation

```bash
# Clone the repository
git clone https://github.com/your-username/devomar.git
cd devomar

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate --seed

# Build assets
npm run build

# Start the development server
php artisan serve
```

## Development

```bash
# Run development server with hot reload
npm run dev

# Run tests
php artisan test

# Run code formatting
vendor/bin/pint
```

## License

This project is proprietary software. All rights reserved.
