<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\locale;
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
        $Languages = Locale::latest()->paginate();
        return view('Admins.Locale.index', compact('Languages') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admins.Locale.create' );
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
            'name' => 'required|max:50|unique:locales',
            'slug' => 'required|max:3|unique:locales'
        ]);

        $locale = new Locale;
        $locale->name = $request->name;
        $locale->slug = $request->slug;
        $locale->save();

        return redirect()->back()->with('success','Language has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function show(locale $locale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function edit(locale $locale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, locale $locale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\locale  $locale
     * @return \Illuminate\Http\Response
     */
    public function destroy(locale $locale)
    {
        //
    }
}
