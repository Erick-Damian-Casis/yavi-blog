<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Rol;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Rol::factory()->sequence(
            [
                'name' => 'Student'
            ],
            [
                'name' => 'Teacher'
            ])->create();

        User::factory(5)->create();

        Article::factory(5)->has(
            Comment::factory()->count(10)
        )->create();
    }
}
