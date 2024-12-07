<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenido' => $this->faker->sentence(),
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'book_id' => Book::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
