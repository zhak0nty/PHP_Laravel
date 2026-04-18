<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::with('books')->latest()->get();

        return view('authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
        ]);

        $author = Author::create($data);

        return redirect()
            ->route('authors.show', $author)
            ->with('status', 'Author created successfully.');
    }

    public function show(Author $author): View
    {
        $author->load('books');

        return view('authors.show', compact('author'));
    }
}
