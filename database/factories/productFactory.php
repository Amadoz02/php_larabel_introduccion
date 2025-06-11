<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name'=> fake()->name(),
        'description' => fake()->text(34),
        'price' => fake()->randomFloat(2, 10, 1000), // Precio entre 10 y 1000
        'stock' => fake()->numberBetween(0, 100), // Stock entre 0 y 100
        'category_id'=>category::all()->random()->id, // Relación con la categoría
        'image_id'=>Image::factory()->create()->id, // Relación con la imagen
        
        ];
    }
}
