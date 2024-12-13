<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::insert([
        //     ['category' => 'Tecnología'],
        //     ['category' => 'Estilo de Vida'],
        //     ['category' => 'Educación'],
        //     ['category' => 'Entretenimiento'],
        //     ['category' => 'Negocios'],
        //     ['category' => 'Ciencia'],
        //     ['category' => 'Deportes'],
        //     ['category' => 'Opinión'],
        //     ['category' => 'Noticias'],
        //     ['category' => 'Arte y Cultura'],
        // ]);

        // Comment::factory(4)->create([
        //     'body' => 'Comentario inicial del post.',
        //     'commentable_type' => Post::class,
        //     'commentable_id' => Post::inRandomOrder()->first()->id,
        //     'user_id' => User::inRandomOrder()->first()->id
        // ]);

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}
// 'category' => fake()->randomElement([
//     'Tecnología',
//     'Estilo de Vida',
//     'Educación',
//     'Entretenimiento',
//     'Negocios',
//     'Ciencia',
//     'Deportes',
//     'Opinión',
//     'Noticias',
//     'Arte y Cultura',
// ])