<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Project Details')
                    ->schema([
                        TextEntry::make('title'),
                        IconEntry::make('is_active')
                            ->boolean(),
                        TextEntry::make('description')
                            ->html()
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Tags')
                    ->schema([
                        TextEntry::make('tags.name')
                            ->badge()
                            ->separator(','),
                    ]),
                Section::make('Metadata')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (Project $record): bool => $record->trashed()),
                    ]),
            ]);
    }
}
