<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect('/')->with('error', 'Please log in to access this page.');
        }

        if (! $request->user()->isActive()) {
            return redirect()->route('account.inactive')
                ->with('status', $request->user()->account_status);
        }

        return $next($request);
    }
}
