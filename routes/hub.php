<?php

use GetCandy\Hub\Http\Middleware\Authenticate;
use GetCandy\Settings\Http\Livewire\Pages\SettingsIndex;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => config('getcandy-hub.system.path', 'hub'),
    'middleware' => [
        'web',
    ],
], function () {
    Route::group([
        'middleware' => [
            Authenticate::class,
            // 'can:settings:manage',
        ],
        'prefix' => 'site-settings',
    ], function () {
        Route::get('/', SettingsIndex::class)->name('hub.site-settings.index');
    });
});
