<?php

namespace Lunar\Settings\Models;

use Lunar\Base\BaseModel;
use Lunar\Settings\Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Setting extends BaseModel
{
    use HasFactory;

    /**
     * Define which attributes should be
     * protected from mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updated(function ($setting) {
            Cache::forget($setting->key);
        });
    }

    /**
     * Return a new factory instance for the model.
     *
     * @return \Lunar\Settings\Factories\SettingFactory
     */
    protected static function newFactory(): SettingFactory
    {
        return SettingFactory::new();
    }
}
