<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\WithFaker;
use PreemStudio\Jetpack\TestBench\AbstractPackageTestCase;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    use WithFaker;

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('badges', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create('model_has_badges', function (Blueprint $table): void {
            $table->unsignedBigInteger('badge_id');
            $table->morphs('model');
        });
    }

    protected function getServiceProviderClass(): string
    {
        return \PreemStudio\Badges\ServiceProvider::class;
    }
}
