<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load tags from Spatie Tags
        $data['tags'] = $this->record->tags->pluck('name')->toArray();

        // Load thumbnail from Spatie Media Library
        $media = $this->record->getFirstMedia('thumbnails');
        if ($media) {
            $data['thumbnail'] = $media->getPath();
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Remove tags from data as they're handled separately via Spatie Tags
        Arr::forget($data, 'tags');

        // Remove thumbnail as it's handled separately via Spatie Media Library
        Arr::forget($data, 'thumbnail');

        return $data;
    }

    protected function afterSave(): void
    {
        $formData = $this->form->getRawState();

        // Sync tags via Spatie Tags
        if (isset($formData['tags'])) {
            $this->record->syncTags($formData['tags']);
        }

        // Handle thumbnail via Spatie Media Library
        if (! empty($formData['thumbnail'])) {
            // Clear existing thumbnails
            $this->record->clearMediaCollection('thumbnails');

            $thumbnails = is_array($formData['thumbnail']) ? $formData['thumbnail'] : [$formData['thumbnail']];
            foreach ($thumbnails as $thumbnail) {
                if (file_exists(storage_path('app/public/'.$thumbnail))) {
                    $this->record
                        ->addMedia(storage_path('app/public/'.$thumbnail))
                        ->toMediaCollection('thumbnails');
                }
            }
        } elseif (empty($formData['thumbnail'])) {
            // Clear thumbnails if removed
            $this->record->clearMediaCollection('thumbnails');
        }
    }
}
