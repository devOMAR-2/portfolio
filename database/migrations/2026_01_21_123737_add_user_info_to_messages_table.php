<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('status');
            $table->text('user_agent')->nullable()->after('ip_address');
            $table->string('browser')->nullable()->after('user_agent');
            $table->string('platform')->nullable()->after('browser');
            $table->string('device')->nullable()->after('platform');
            $table->string('country')->nullable()->after('device');
            $table->string('city')->nullable()->after('country');
            $table->string('referrer_url')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn([
                'ip_address',
                'user_agent',
                'browser',
                'platform',
                'device',
                'country',
                'city',
                'referrer_url',
            ]);
        });
    }
};
