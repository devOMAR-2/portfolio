<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ProjectsChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Projects (Last 6 Months)';

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(fn ($monthsAgo) => Carbon::now()->subMonths($monthsAgo));

        $labels = $months->map(fn ($date) => $date->format('M'))->toArray();

        $activeData = $months->map(fn ($date) => Project::whereMonth('created_at', $date->month)
            ->whereYear('created_at', $date->year)
            ->where('is_active', true)
            ->count()
        )->toArray();

        $inactiveData = $months->map(fn ($date) => Project::whereMonth('created_at', $date->month)
            ->whereYear('created_at', $date->year)
            ->where('is_active', false)
            ->count()
        )->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Active',
                    'data' => $activeData,
                    'backgroundColor' => '#22c55e',
                ],
                [
                    'label' => 'Inactive',
                    'data' => $inactiveData,
                    'backgroundColor' => '#f59e0b',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
