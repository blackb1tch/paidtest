<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carColors = [
            'white' => '#ffffff',
            'red' => '#FF0000',
            'blue' => '#0000FF',
            'yellow' => '#FFFF00'
        ];

        foreach ($carColors as $carColor => $code) {
            Color::factory()->create([
                'color' => $carColor,
                'code' => $code,
                'price' => 1000
            ]);
        }
    }
}
