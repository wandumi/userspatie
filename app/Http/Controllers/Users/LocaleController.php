<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Languages = Locale::latest()->paginate(5);

        return view('Admins.locale.index', compact('Languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admins.locale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:3'
        ]);

        $locale = new Locale;
        $locale->name = $request->name;
        $locale->slug = $request->slug;
        $locale->save();

        return redirect()->route('adminlanguages.index')->with('success', 'Language added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function show(Locale $locale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $locale = Locale::where('id',$id)->first();
       
        return view('Admins.locale.edit', compact('locale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:3'
        ]);
   
        $locale = Locale::find($id);
        $locale->name = $request->name;
        $locale->slug = $request->slug;
        $locale->save();

        return redirect()->route('adminlanguages.index')->with('success', "Language was successfully Added");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locale = Locale::where('id',$id)->first();
   
        $locale->delete();
     
        return redirect()->route('adminlanguages.index')->with('success', "Language Deleted successfully");
    }
}
