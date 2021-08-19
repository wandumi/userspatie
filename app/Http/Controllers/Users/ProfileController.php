<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\locale;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        // @dd(Auth::user()->id);

        $this->validate($request, [
            'user_id' => 'required|unique:profiles',
            
        ]);

        $user = User::where('id',Auth::user()->id)->first();


        $user_profile = new Profile;
        $user_profile->user_id = $user->id;
        $user_profile->locale_id = $request->locale_id;
        $user_profile->address = $request->address;
                
        $user_profile->save();

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
        //@dd(empty($User->profile->locale_id)  );

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
        $user = User::where('id',Auth::user()->id)->first();


        $user_profile = Profile::where('user_id',$id)->first();

        
        $user_profile->user_id = $user->id;
        $user_profile->locale_id = $request->language;
                
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
