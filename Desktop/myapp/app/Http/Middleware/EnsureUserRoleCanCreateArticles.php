<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Moderators must not create articles (enforced also by ArticlePolicy).
 */
class EnsureUserRoleCanCreateArticles
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->isModerator()) {
            abort(403, __('Moderators cannot create articles.'));
        }

        return $next($request);
    }
}
