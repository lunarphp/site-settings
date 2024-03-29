<?php

namespace Lunar\Settings\Facades;

use Illuminate\Support\Facades\Facade;
use Lunar\Settings\Managers\SiteSettingManager;

class SiteSettings extends Facade
{
    public static function getFacadeAccessor()
    {
        return SiteSettingManager::class;
    }
}
