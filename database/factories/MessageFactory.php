<?php

namespace Database\Factories;

use App\Enums\MessageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    private const BROWSERS = ['Chrome', 'Firefox', 'Safari', 'Edge', 'Opera'];

    private const PLATFORMS = ['Windows', 'macOS', 'Linux', 'iOS', 'Android'];

    private const DEVICES = ['Desktop', 'Mobile', 'Tablet'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'company' => fake()->optional(0.7)->company(),
            'phone' => fake()->phoneNumber(),
            'message' => fake()->paragraphs(rand(1, 3), true),
            'status' => fake()->randomElement(MessageStatus::cases()),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'browser' => fake()->randomElement(self::BROWSERS),
            'platform' => fake()->randomElement(self::PLATFORMS),
            'device' => fake()->randomElement(self::DEVICES),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'referrer_url' => fake()->optional(0.6)->url(),
        ];
    }

    public function unread(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => MessageStatus::Unread,
        ]);
    }

    public function seen(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => MessageStatus::Seen,
        ]);
    }

    public function contacted(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => MessageStatus::Contacted,
        ]);
    }

    public function withoutUserInfo(): static
    {
        return $this->state(fn (array $attributes): array => [
            'ip_address' => null,
            'user_agent' => null,
            'browser' => null,
            'platform' => null,
            'device' => null,
            'country' => null,
            'city' => null,
            'referrer_url' => null,
        ]);
    }
}
