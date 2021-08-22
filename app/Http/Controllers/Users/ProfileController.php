<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\locale;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Profile::with('locale')->first() );
        return view("Users.profile.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user()->id;

        $profile = Profile::firstOrNew(['user_id'   => $user ]);

        $profile->user_id = $user;
        $profile->locale_id = $request->locale_id;
        $profile->address = $request->address;
                
        $profile->save();

        

        

        return redirect()->back()->with('success','Profile saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::where('id', $id)->first();

        $Languages = locale::all();

        return view("Users.profile.edit", compact('User', 'Languages') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $User = User::where('id', $id)->first();
        // @dd($User->profile->locale_id);

        $Languages = locale::all();

        return view("Users.profile.edit", compact('User', 'Languages') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // @dd(Auth::user()->id);
        //dd($request->all());
        $user = User::where('id',Auth::user()->id)->first();

        $language = Locale::all();

        $user_profile = Profile::where('user_id',$id)->first();
        $user_profile->user_id = $user->id;
        $user_profile->locale_id = $request->locale_id;
                
        //dd($request->locale_id);
        foreach($language as $lang)
        {
           
            if($lang->id == $request->locale_id)
            {
                // dd($lang);
                Session::put('locale', $lang->slug);
                App::setLocale($lang->slug);
            }
        }

        $user_profile->save();

        return redirect()->back()->with('success','Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
