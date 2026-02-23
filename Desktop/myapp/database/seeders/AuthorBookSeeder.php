<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorBookSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Author One',
                'email' => 'author1@example.com',
                'books' => [
                    ['title' => 'Book 1A', 'description' => 'Description 1A'],
                    ['title' => 'Book 1B', 'description' => 'Description 1B'],
                ],
            ],
            [
                'name' => 'Author Two',
                'email' => 'author2@example.com',
                'books' => [
                    ['title' => 'Book 2A', 'description' => 'Description 2A'],
                    ['title' => 'Book 2B', 'description' => 'Description 2B'],
                ],
            ],
            [
                'name' => 'Author Three',
                'email' => 'author3@example.com',
                'books' => [
                    ['title' => 'Book 3A', 'description' => 'Description 3A'],
                    ['title' => 'Book 3B', 'description' => 'Description 3B'],
                ],
            ],
        ];

        foreach ($authors as $a) {
            $author = Author::create([
                'name' => $a['name'],
                'email' => $a['email'],
            ]);

            // создаём книги через relationship (это красиво для задания Eloquent)
            $author->books()->createMany($a['books']);
        }
    }
}