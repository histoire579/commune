<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdminHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // if ($request->user()->role ===$role) return $next($request);

        // abort(403);
        
        if ($request->user()->role != $role) {
            //flash("Vous n'avez pas le droit de voir cette page.")->error();

            return redirect('/administration/info');
        }
        
        return $next($request);
    }
}
