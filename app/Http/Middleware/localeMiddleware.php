<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use App\Models\Locale;
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
            // $locale = $request->user()->profile->locale->slug;

            $User = User::where('id', Auth::user()->id)->first();

            $language = Locale::all();

            foreach($language as $lang)
            {
                //dd($lang->id);
                //@dd($request->user()->profile->locale_id );

                if( empty( $request->user()->profile->locale_id ) ){

                    $locale = config('app.fallback_locale');

                    Session::put('locale', $locale );

                } else if ($request->user()->profile->locale_id == $lang->id){

                    
                    $locale = $lang->slug;

                    Session::put('locale', $locale  );

                    // dd(Session::get('locale'));

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

                    
                }



            }      
        }

        

        

        return $next($request);
    }
}
