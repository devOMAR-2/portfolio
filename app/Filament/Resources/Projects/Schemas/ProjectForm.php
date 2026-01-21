<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Spatie\Tags\Tag;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Project Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        ToggleButtons::make('is_active')
                            ->boolean()
                            ->grouped()
                            ->inline(true)
                            ->columnSpan(1),
                        TextInput::make('description')
                            ->required()
                            ->autocapitalize('words')
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Tags')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->label('Thumbnail Image')
                            ->image()
                            ->disk('public')
                            ->directory('projects')
                            ->visibility('public')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth(1920)
                            ->imageResizeTargetHeight(1080)
                            ->collection('thumbnails')
                            ->maxSize(5120),
                        TagsInput::make('tags')
                            ->suggestions(fn (): array => Tag::all()->pluck('name')->toArray()),
                    ]),
            ]);
    }
}
