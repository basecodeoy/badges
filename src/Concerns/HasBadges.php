<?php

declare(strict_types=1);

namespace PreemStudio\Badges\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Config;

trait HasBadges
{
    public function badges(): MorphToMany
    {
        return $this->morphToMany(
            Config::get('badgeable.models.badge'),
            'model',
            Config::get('badgeable.tables.model_has_badges')
        );
    }
}
