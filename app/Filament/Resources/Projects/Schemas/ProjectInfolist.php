<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
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
                        TextEntry::make('description')
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Tags')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('thumbnail')
                            ->collection('thumbnails'),
                        TextEntry::make('tags.name')
                            ->label('Tags')
                            ->badge()
                            ->separator(','),
                    ]),
                Section::make('Metadata')
                    ->schema([
                        IconEntry::make('is_active')
                            ->label('Active')
                            ->boolean(),
                        TextEntry::make('created_at')
                            ->dateTime('l M d, Y - h:i A')
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime('l M d, Y - h:i A')
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->dateTime('l M d, Y - h:i A')
                            ->visible(fn (Project $record): bool => $record->trashed()),
                    ])->columns(fn (Project $record): int => $record->trashed() ? 4 : 3),
            ]);
    }
}
