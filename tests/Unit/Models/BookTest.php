<?php

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('book stores and retrieves short_title correctly', function () {
    $   author = Author::factory()->create();

    $book = Book::create([
        'title' => 'The Brothers Karamazov',
        'short_title' => 'Karamazov',
        'year' => 1880,
        'author_id' => $author->id,
    ]);

    expect($book->short_title)->toBe('Karamazov');

    $fresh = Book::find($book->id);
    expect($fresh->short_title)->toBe('Karamazov');
});

test('book belongs to author', function () {
    $author = Author::factory()->create();
    $book = Book::factory()->create(['author_id' => $author->id]);

    expect($book->author)->toBeInstanceOf(Author::class);
    expect($book->author->id)->toBe($author->id);
});

test('book casts year as integer', function () {
    $author = Author::factory()->create();
    $book = Book::create([
        'title' => 'War and Peace',
        'short_title' => 'War',
        'year' => '1869',
        'author_id' => $author->id,
    ]);

    expect($book->fresh()->year)->toBe(1869);
});
