<?php

namespace App\Models;

use App\Enums\MessageStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'message',
        'status',
        'ip_address',
        'user_agent',
        'browser',
        'platform',
        'device',
        'country',
        'city',
        'referrer_url',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => MessageStatus::class,
        ];
    }
}
