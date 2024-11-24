<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\Badges\Concerns\HasBadges;
use Illuminate\Foundation\Auth\User;

final class ClassThatHasBadges extends User
{
    use HasBadges;

    public $table = 'users';

    public $guarded = [];
}
