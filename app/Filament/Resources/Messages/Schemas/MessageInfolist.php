<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Contact Information')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),
                        TextEntry::make('company')
                            ->placeholder('N/A'),
                        TextEntry::make('phone')
                            ->copyable(),
                    ]),
                Section::make('Message')
                    ->schema([
                        TextEntry::make('message')
                            ->prose()
                            ->columnSpanFull(),
                    ]),
                Section::make('Metadata')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('created_at')
                            ->label('Received')
                            ->dateTime(),
                    ]),
            ]);
    }
}
