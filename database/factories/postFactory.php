<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
{
    return [
        'user_id' => function () {
            return User::factory()->create()->id;
        }, // Relación con el usuario

        'title' => $this->faker->text(15),// Título del post
        'body' => $this->faker->text(200), // Contenido del post
        
    ];
}
}
