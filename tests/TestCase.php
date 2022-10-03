<?php

namespace Lunar\Settings\Tests;

use Cartalyst\Converter\Laravel\ConverterServiceProvider;
use Lunar\LunarServiceProvider;
use Lunar\Hub\AdminHubServiceProvider;
use Lunar\Settings\SettingsServiceProvider;
use Lunar\Stripe\StripePaymentsServiceProvider;
use Lunar\Tests\Stubs\User;
use Illuminate\Support\Facades\Config;
use Kalnoy\Nestedset\NestedSetServiceProvider;
use Livewire\LivewireServiceProvider;
use Spatie\Activitylog\ActivitylogServiceProvider;
use Spatie\MediaLibrary\MediaLibraryServiceProvider;
use Stripe\ApiRequestor;
use Tests\Stripe\MockClient;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AdminHubServiceProvider::class,
            LunarServiceProvider::class,
            LivewireServiceProvider::class,
            MediaLibraryServiceProvider::class,
            ActivitylogServiceProvider::class,
            ConverterServiceProvider::class,
            NestedSetServiceProvider::class,
            SettingsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}
