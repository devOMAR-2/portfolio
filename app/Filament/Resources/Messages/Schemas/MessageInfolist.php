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
                            ->dateTime('l M d, Y - h:i A'),
                    ]),
                Section::make('User Information')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->placeholder('N/A')
                            ->copyable(),
                        TextEntry::make('browser')
                            ->placeholder('N/A'),
                        TextEntry::make('platform')
                            ->label('Operating System')
                            ->placeholder('N/A'),
                        TextEntry::make('device')
                            ->placeholder('N/A'),
                        TextEntry::make('country')
                            ->placeholder('N/A'),
                        TextEntry::make('city')
                            ->placeholder('N/A'),
                        TextEntry::make('referrer_url')
                            ->label('Referrer')
                            ->placeholder('Direct visit')
                            ->columnSpanFull()
                            ->url(fn ($state) => $state, shouldOpenInNewTab: true),
                        TextEntry::make('user_agent')
                            ->label('User Agent')
                            ->placeholder('N/A')
                            ->columnSpanFull()
                            ->copyable(),
                    ]),
            ]);
    }
}
