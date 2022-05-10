<?php

namespace GetCandy\Settings\Facades;

use GetCandy\Shipping\Interfaces\ShippingMethodManagerInterface;
use Illuminate\Support\Facades\Facade;
use GetCandy\Settings\Managers\SiteSettingManager;

class SiteSettings extends Facade
{
    public static function getFacadeAccessor()
    {
        return SiteSettingManager::class;
    }
}
