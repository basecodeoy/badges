<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Auth\User;
use PreemStudio\Badges\Concerns\HasBadges;

class ClassThatHasBadges extends User
{
    use HasBadges;

    public $table = 'users';

    public $guarded = [];
}
