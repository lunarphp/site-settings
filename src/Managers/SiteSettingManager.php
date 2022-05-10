<?php

namespace GetCandy\Settings\Managers;

use GetCandy\Settings\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SiteSettingManager
{
    /**
     * Get a site setting value from a given key
     *
     * @param string $key
     * @param bool $bypassCache
     *
     * @return string
     */
    public function get(string $key, $fallback = null, $bypassCache = false)
    {
        if (!$bypassCache) {
            $value = Cache::remember($key, 600, function () use ($key) {
                return Setting::where('key', '=', $key)->first()?->value;
            });
        } else {
            $value = Setting::where('key', '=', $key)->first()?->value;
        }

        return $value ?: $fallback;
    }
}
