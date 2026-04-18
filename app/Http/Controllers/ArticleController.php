<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('article.create.allowed', only: ['create', 'store']),
        ];
    }

    public function index(): View
    {
        $this->authorize('viewAny', Article::class);

        $user = auth()->user();
        $articles = $user->isModerator()
            ? Article::with('user')->latest()->paginate(15)
            : Article::where('user_id', $user->id)->latest()->paginate(15);

        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        $this->authorize('create', Article::class);

        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $request->user()->articles()->create($request->validated());

        return redirect()->route('articles.index')
            ->with('status', __('Article created successfully.'));
    }

    public function show(Article $article): View
    {
        $this->authorize('view', $article);

        $article->load('user');

        return view('articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return redirect()->route('articles.show', $article)
            ->with('status', __('Article updated successfully.'));
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')
            ->with('status', __('Article deleted successfully.'));
    }
}
