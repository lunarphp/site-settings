<?php

namespace Lunar\Settings;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Lunar\Hub\Facades\Menu;
use Lunar\Settings\Http\Livewire\Pages\SettingsIndex;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/hub.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'settings');

        $components = [
           SettingsIndex::class,
        ];

        $slot = Menu::slot('settings');

        // dd($slot);
        $slot->addItem(function ($item) {
            $item->name(
                'Site Settings'
            )->handle('hub.site-settings')
            ->route('hub.site-settings.index')
            ->icon('adjustments');
        });

        foreach ($components as $component) {
            Livewire::component((new $component())->getName(), $component);
        }
    }
}
