<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use Illuminate\Foundation\Auth\User;
use BombenProdukt\Badges\Concerns\HasBadges;

final class ClassThatHasBadges extends User
{
    use HasBadges;

    public $table = 'users';

    public $guarded = [];
}
