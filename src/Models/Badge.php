<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Badges\Models;

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
        return self::where('slug', $slug)->firstOrFail();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    public function getTable(): string
    {
        return Config::get('badgeable.tables.badges');
    }
}
