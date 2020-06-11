<?php

namespace App\Http\Controllers;

use Auth;
use App\Shoppinglist;
use App\Shoppingitem;
use Illuminate\Http\Request;

class ShoppingitemController extends Controller
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
        $shoppinglists = Shoppinglist::orderBy('title')->get();

        return view('shoppingitems/create', [
            'shoppinglists'     => $shoppinglists
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'shoppinglist_id'   => 'required',
            'category'          => 'required',
            'quantity'          => 'required',
            'name'              => 'required'
        ]);

        // $validData['user_id'] = Auth::id();

        $shoppingitem = Shoppingitem::create($validData);

        return redirect('shoppingitems/create')->with('status', 'Shoppingitem added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoppingitem  $shoppingitem
     * @return \Illuminate\Http\Response
     */
    public function show(Shoppingitem $shoppingitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shoppingitem  $shoppingitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoppingitem $shoppingitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shoppingitem  $shoppingitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoppingitem $shoppingitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shoppingitem  $shoppingitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoppingitem $shoppingitem)
    {
        //
    }
}
