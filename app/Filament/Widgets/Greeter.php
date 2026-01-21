<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class Greeter extends Widget
{
    protected static ?int $sort = 1;

    protected string $view = 'filament.widgets.greeter';

    protected int|string|array $columnSpan = 'full';
}
