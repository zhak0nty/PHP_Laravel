<?php

use App\Models\Author;

test('store creates a new author and persists it to the database', function () {
    $payload = [
        'name' => 'Fyodor',
        'surname' => 'Dostoevsky',
        'birthdate' => '1821-11-11',
    ];

    $response = $this->post(route('authors.store'), $payload);

    $this->assertDatabaseHas('authors', [
        'name' => 'Fyodor',
        'surname' => 'Dostoevsky',
    ]);

    $author = Author::where('surname', 'Dostoevsky')->first();
    expect($author)->not->toBeNull();
    expect($author->birthdate->format('Y-m-d'))->toBe('1821-11-11');

    $response->assertStatus(302);
    $response->assertRedirect(route('authors.show', $author));
});

test('store validates required fields', function () {
    $response = $this->from(route('authors.create'))->post(route('authors.store'), []);

    $response->assertStatus(302);
    $response->assertSessionHasErrors(['name', 'surname', 'birthdate']);
    expect(Author::count())->toBe(0);
});
