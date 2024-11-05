<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BaseCodeOy\Badges\Concerns\HasBadges;
use Illuminate\Foundation\Auth\User;

final class ClassThatHasBadges extends User
{
    use HasBadges;

    public $table = 'users';

    public $guarded = [];
}
