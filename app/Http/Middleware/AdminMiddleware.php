<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
//    public function handle(Request $request, Closure $next)
//    {
//        return $next($request);
//    }

    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
//            config(['session.after_login_redirect' => '/admin']);
            return $next($request);
        }

        return redirect('/login');
    }
}
