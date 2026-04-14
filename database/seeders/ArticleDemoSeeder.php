<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleDemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'user@example.com',
            'role' => User::ROLE_USER,
        ]);

        Article::factory()->count(2)->create(['user_id' => $user->id]);

        User::factory()->moderator()->create([
            'name' => 'Demo Moderator',
            'email' => 'moderator@example.com',
        ]);
    }
}
