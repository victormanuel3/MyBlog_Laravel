<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Elegir aleatoriamente un modelo (Post o Comentario(subcomentario))
        $model = fake()->randomElement([Post::class, Comment::class]);
        $id = $model::inRandomOrder()->first()->id; 

        return [
            'body' => fake()->paragraph(),
            'commentable_type' => $model,
            'commentable_id' => $id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
