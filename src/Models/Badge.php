<?php

declare(strict_types=1);

namespace PreemStudio\Badges\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

final class Badge extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description'];

    public static function findByslug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function getTable(): string
    {
        return Config::get('laravel-badgeable.tables.badges');
    }
}
