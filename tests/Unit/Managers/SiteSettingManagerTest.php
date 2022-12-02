<?php

namespace Lunar\Settings\Tests\Unit\Managers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Lunar\Settings\Facades\SiteSettings;
use Lunar\Settings\Managers\SiteSettingManager;
use Lunar\Settings\Models\Setting;
use Lunar\Settings\Tests\TestCase;

class SiteSettingManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function can_get_site_setting()
    {
        Setting::factory()->create([
            'key' => 'foo',
            'value' => 'bar',
        ]);

        $manager = new SiteSettingManager();

        $value = $manager->get('foo');

        $this->assertEquals('bar', $value);
        $this->assertEquals('bar', Cache::get('foo'));
    }

    /** @test **/
    public function can_use_fallback_value()
    {
        $manager = new SiteSettingManager();
        $value = $manager->get('foo', 'bar');

        $this->assertDatabaseMissing(
            (new Setting())->getTable(),
            [
                'key' => 'foo',
            ]
        );

        $this->assertEquals('bar', $value);
    }

    /** @test **/
    public function can_use_the_facade()
    {
        Setting::factory()->create([
            'key' => 'foo',
            'value' => 'bar',
        ]);

        $value = SiteSettings::get('foo');

        $this->assertEquals('bar', $value);
        $this->assertEquals('bar', Cache::get('foo'));
    }

    /** @test **/
    public function cache_is_refreshed_on_setting_update()
    {
        $setting = Setting::factory()->create([
            'key' => 'foo',
            'value' => 'bar',
        ]);

        $value = SiteSettings::get('foo');

        $this->assertEquals('bar', $value);
        $this->assertEquals('bar', Cache::get('foo'));

        $setting->update([
            'value' => 'foo',
        ]);

        $value = SiteSettings::get('foo');

        $this->assertEquals('foo', $value);
        $this->assertEquals('foo', Cache::get('foo'));
    }
}
