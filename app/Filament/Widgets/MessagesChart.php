<?php

namespace App\Filament\Widgets;

use App\Enums\MessageStatus;
use App\Models\Message;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class MessagesChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Messages (Last 7 Days)';

    protected function getData(): array
    {
        $days = collect(range(6, 0))->map(fn ($daysAgo) => Carbon::now()->subDays($daysAgo));

        $labels = $days->map(fn ($date) => $date->format('D'))->toArray();

        $unreadData = $days->map(fn ($date) => Message::whereDate('created_at', $date)
            ->where('status', MessageStatus::Unread)
            ->count()
        )->toArray();

        $seenData = $days->map(fn ($date) => Message::whereDate('created_at', $date)
            ->where('status', MessageStatus::Seen)
            ->count()
        )->toArray();

        $contactedData = $days->map(fn ($date) => Message::whereDate('created_at', $date)
            ->where('status', MessageStatus::Contacted)
            ->count()
        )->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Unread',
                    'data' => $unreadData,
                    'borderColor' => '#ef4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                ],
                [
                    'label' => 'Seen',
                    'data' => $seenData,
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                ],
                [
                    'label' => 'Contacted',
                    'data' => $contactedData,
                    'borderColor' => '#22c55e',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
