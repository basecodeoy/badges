<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests;

use BaseCodeOy\Crate\TestBench\AbstractPackageTestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    use WithFaker;

    #[\Override()]
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $blueprint): void {
            $blueprint->bigIncrements('id');
            $blueprint->string('name');
            $blueprint->string('email');
            $blueprint->string('password');
            $blueprint->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('badges', function (Blueprint $blueprint): void {
            $blueprint->bigIncrements('id');
            $blueprint->string('slug');
            $blueprint->string('name');
            $blueprint->string('description');
            $blueprint->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('model_has_badges', function (Blueprint $blueprint): void {
            $blueprint->unsignedBigInteger('badge_id');
            $blueprint->morphs('model');
        });
    }

    #[\Override()]
    protected function getServiceProviderClass(): string
    {
        return \BaseCodeOy\Badges\ServiceProvider::class;
    }
}
