<?php

namespace App\Http\Controllers;

use Auth;
use App\Shoppinglist;
use Illuminate\Http\Request;

class ShoppinglistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/shoppinglists/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('store');
        $validData = $request->validate([
            'title'     => 'required'
            ]);

        $validData['user_id'] = Auth::id();
        $shoppinglist = Shoppinglist::create($validData);

        return redirect('/shoppinglists/create')->with('status', 'Shoppinglist created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function show(Shoppinglist $shoppinglist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoppinglist $shoppinglist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoppinglist $shoppinglist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoppinglist $shoppinglist)
    {
        //
    }
}
