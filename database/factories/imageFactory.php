<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
$faker = \Faker\Factory::create();
$faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class imageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // fake()->imageUrl() genera URLs de imágenes
            "url" => $this->faker->imageUrl($this->faker->numberBetween(600, 1800), $this->faker->numberBetween(600, 1800)),
        ];
    }
}
