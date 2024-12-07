<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\Fixtures\ClassThatHasBadges;

uses(RefreshDatabase::class);

it('should morph to a badges', function (): void {
    $user = ClassThatHasBadges::create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'password',
    ]);

    $user->badges()->create([
        'name' => $this->faker->firstName,
        'description' => $this->faker->paragraph,
    ]);

    expect($user->badges())->toBeInstanceOf(MorphToMany::class);
    expect($user->badges)->toBeInstanceOf(Collection::class);
});
