<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['email' => 'active@test.com']);
        User::factory()->suspended()->create(['email' => 'suspended@test.com']);
    }
}
