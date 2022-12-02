<?php

namespace Lunar\Settings\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lunar\Settings\Models\Setting;

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
