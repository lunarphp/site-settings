<?php

namespace GetCandy\Settings\Database\Factories;

use GetCandy\Settings\Models\Setting;
use GetCandy\Shipping\Models\ShippingZone;
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
