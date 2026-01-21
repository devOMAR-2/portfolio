<?php

namespace App\Filament\Widgets;

use App\Enums\MessageStatus;
use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MessagesStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 4;

    protected function getStats(): array
    {
        $total = Message::count();
        $unread = Message::where('status', MessageStatus::Unread)->count();
        $seen = Message::where('status', MessageStatus::Seen)->count();
        $contacted = Message::where('status', MessageStatus::Contacted)->count();
        $thisWeek = Message::where('created_at', '>=', now()->startOfWeek())->count();

        return [
            Stat::make('Total Messages', $total)
                ->description($thisWeek.' this week')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),
            Stat::make('Unread', $unread)
                ->description($total > 0 ? round(($unread / $total) * 100).'% of total' : '0%')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
            Stat::make('Seen', $seen)
                ->description($total > 0 ? round(($seen / $total) * 100).'% of total' : '0%')
                ->descriptionIcon('heroicon-m-eye')
                ->color('warning'),
            Stat::make('Contacted', $contacted)
                ->description($total > 0 ? round(($contacted / $total) * 100).'% of total' : '0%')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
