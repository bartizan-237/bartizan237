<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Locale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Carbon\Carbon::setLocale("ko");
        App::setLocale(config("app.locale"));
        return $next($request);
    }

}
