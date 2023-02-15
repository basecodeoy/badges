<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\Unit\ClassThatHasBadges;

uses(RefreshDatabase::class);

it('should morph to a badgeable', function (): void {
    $user = ClassThatHasBadges::create([
        'name'     => 'John Doe',
        'email'    => 'john@doe.com',
        'password' => 'password',
    ]);

    $user->badges()->create([
        'name'        => $this->faker->firstName,
        'description' => $this->faker->paragraph,
    ]);

    expect($user->badges())->toBeInstanceOf(MorphToMany::class);
    expect($user->badges)->toBeInstanceOf(Collection::class);
});
