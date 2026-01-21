<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove tags from data as they're handled separately via Spatie Tags
        Arr::forget($data, 'tags');

        // Remove thumbnail as it's handled separately via Spatie Media Library
        Arr::forget($data, 'thumbnail');

        return $data;
    }

    protected function afterCreate(): void
    {
        $formData = $this->form->getRawState();

        // Sync tags via Spatie Tags
        if (isset($formData['tags'])) {
            $this->record->syncTags($formData['tags']);
        }

        // Handle thumbnail via Spatie Media Library
        if (! empty($formData['thumbnail'])) {
            $thumbnails = is_array($formData['thumbnail']) ? $formData['thumbnail'] : [$formData['thumbnail']];
            foreach ($thumbnails as $thumbnail) {
                $this->record
                    ->addMedia(storage_path('app/public/' . $thumbnail))
                    ->toMediaCollection('thumbnails');
            }
        }
    }
}
