<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Badges\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Config;

trait HasBadges
{
    public function badges(): MorphToMany
    {
        return $this->morphToMany(
            Config::get('badges.models.badge'),
            'model',
            Config::get('badges.tables.model_has_badges'),
        );
    }
}
