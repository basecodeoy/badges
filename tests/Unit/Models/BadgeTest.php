<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use BombenProdukt\Badges\Models\Badge;

uses(RefreshDatabase::class);

it('can be found by its slug', function (): void {
    $badge = Badge::create([
        'name' => $this->faker->firstName,
        'description' => $this->faker->paragraph,
        'color' => $this->faker->hexColor,
    ]);

    expect($badge->id)->toBe(Badge::findBySlug($badge->slug)->id);
});
