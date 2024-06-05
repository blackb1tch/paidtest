<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    protected $model = Color::class;

    public function definition(): array
    {
        return [
            'color'  => $this->faker->company,
            'code'   => $this->faker->unique()->word,
            'price' => $this->faker->numberBetween(1, 10),
        ];
    }
}
