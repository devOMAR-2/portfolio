<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum MessageStatus: string implements HasLabel, HasColor, HasIcon
{
    case Unread = 'unread';
    case Seen = 'seen';
    case Contacted = 'contacted';

    public function getLabel(): string
    {
        return match ($this) {
            self::Unread => 'Unread',
            self::Seen => 'Seen',
            self::Contacted => 'Contacted',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Unread => 'danger',
            self::Seen => 'warning',
            self::Contacted => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Unread => 'heroicon-o-envelope',
            self::Seen => 'heroicon-o-eye',
            self::Contacted => 'heroicon-o-check-circle',
        };
    }
}
