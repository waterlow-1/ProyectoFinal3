<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => User::factory(), // Genera un usuario aleatorio
            'calificador_id' => User::factory(), // Genera un calificador aleatorio
            'puntuacion' => $this->faker->numberBetween(1, 5), // Puntuación entre 1 y 5
            'comentario' => $this->faker->optional()->sentence(), // Comentario opcional
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
