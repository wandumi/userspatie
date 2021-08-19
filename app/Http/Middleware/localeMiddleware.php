<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class localeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = null;

        // Check the user if authenticated, and store in session
        if( Auth::check() && !Session::has('locale') )
        {
            //$locale = $request->user()->locale;

            $locale = Auth::user()->profile->locale->slug;
            
            //$user = User::with('profile')->first();
            
            Session::put('locale', $locale);
        }

        // Change the language on a fly
        // depends on the parameter
        if($request->has('locale'))
        {
            $locale = $request->get('locale');
            Session::put('locale', $locale);
        }

        $locale = Session::get('locale');
 
        // set default locale
        if(null === $locale){
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
