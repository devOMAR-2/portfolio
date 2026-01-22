<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Project extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    use HasTags;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('projects')
            ->useFallbackUrl(asset('img/placeholder.png'))
            ->useFallbackPath(public_path('img/placeholder.png'));
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(800)
            ->height(800)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('gallery')
            ->width(1400)
            ->height(1400)
            ->sharpen(10)
            ->nonQueued();
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }
}
