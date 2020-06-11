<?php

namespace App\Http\Controllers;

use Auth;
use App\Shoppinglist;
use App\Shoppingitem;
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
        $shoppinglists = Shoppinglist::orderBy('title')->get();

        return view('/shoppinglists/create', [
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
        //dd('store');
        $validData = $request->validate([
            'title'     => 'required'
            ]);

        $validData['user_id'] = Auth::id();
        $shoppinglist = Shoppinglist::create($validData);

        return redirect('/home')->with('status', 'Shoppinglist created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function show(Shoppinglist $shoppinglist)
    {
        $shoppingitems = $shoppinglist->shoppingitem;

        return view('/shoppinglists/show', [
            'shoppinglist'  => $shoppinglist,
            'shoppingitems' => $shoppingitems

        ]);
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
    public function deleteMany(Shoppinglist $shoppinglist, Request $request)
    {

        $idsToDelete = $request->input('ids');

        Shoppinglist::destroy($idsToDelete);

        return redirect('/shoppingitems/create')->with('status', 'Shoppinglist deleted successfully');
    }
}
