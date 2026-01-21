<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectsStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 5;

    protected function getStats(): array
    {
        $total = Project::count();
        $active = Project::where('is_active', true)->count();
        $inactive = Project::where('is_active', false)->count();
        $archived = Project::onlyTrashed()->count();
        $thisMonth = Project::where('created_at', '>=', now()->startOfMonth())->count();

        return [
            Stat::make('Total Projects', $total)
                ->description($thisMonth.' added this month')
                ->descriptionIcon('heroicon-m-folder')
                ->color('primary'),
            Stat::make('Active', $active)
                ->description($total > 0 ? round(($active / $total) * 100).'% of total' : '0%')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Inactive', $inactive)
                ->description($total > 0 ? round(($inactive / $total) * 100).'% of total' : '0%')
                ->descriptionIcon('heroicon-m-pause-circle')
                ->color('warning'),
            Stat::make('Archived', $archived)
                ->description('Soft deleted')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('gray'),
        ];
    }
}
