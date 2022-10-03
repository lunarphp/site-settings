<?php

namespace Lunar\Settings\Database\Factories;

use Lunar\Settings\Models\Setting;
use Lunar\Shipping\Models\ShippingZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->word,
            'value' => $this->faker->word,
        ];
    }
}
