<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        // Primero crea algunos posts si la tabla está vacía
        if (Post::count() == 0) {
            Post::factory(5)->create();  // Crea 5 posts si la tabla está vacía
        }

        return [
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id, 
        ];
    }
}
