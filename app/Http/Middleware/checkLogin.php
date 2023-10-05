<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Helper::checkLogin() != 'success'
        if (!Auth::check()) {
            if ($request->ajax()) {
                $response=[
                    'status' => 201,
                    'message' => 'Vous devez être connecter pour avoir accès à cette information'
                ];
                return response()->json($response, 201);
            }
            //return redirect()->route('splash.screen')
        }
        return $next($request);
    }
}
