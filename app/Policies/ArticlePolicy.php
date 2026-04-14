<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        return $user->isModerator() || $user->id === $article->user_id;
    }

    /**
     * Only regular users may create articles; moderators cannot.
     */
    public function create(User $user): bool
    {
        return $user->isUserRole();
    }

    public function update(User $user, Article $article): bool
    {
        return $user->isModerator() || $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->isModerator() || $user->id === $article->user_id;
    }
}
