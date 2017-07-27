<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LangSwitch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('lang')) {
            app()->setLocale((Session::get('lang') == 1) ? 'en' : 'bn');
        }else{
            Session::set('lang',1);
            app()->setLocale((Session::get('lang') == 1) ? 'en' : 'bn');
            
        }
        return $next($request);
    }
}
