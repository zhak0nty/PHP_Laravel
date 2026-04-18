<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('fullName() returns concatenation of name and surname', function () {
    $author = new Author(['name' => 'Leo', 'surname' => 'Tolstoy']);

    expect($author->fullName())->toBe('Leo Tolstoy');
});

test('fullName() handles empty surname gracefully', function () {
    $author = new Author(['name' => 'Homer', 'surname' => '']);

    expect($author->fullName())->toBe('Homer');
});

test('author has many books relationship', function () {
    $author = Author::factory()->create();
    Book::factory()->count(3)->create(['author_id' => $author->id]);

    expect($author->books)->toHaveCount(3);
    expect($author->books->first())->toBeInstanceOf(Book::class);
});
