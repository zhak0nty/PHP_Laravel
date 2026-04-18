<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(4);

        return [
            'title' => $title,
            'short_title' => \Illuminate\Support\Str::limit($title, 20, ''),
            'year' => $this->faker->numberBetween(1900, (int) date('Y')),
            'author_id' => Author::factory(),
        ];
    }
}
