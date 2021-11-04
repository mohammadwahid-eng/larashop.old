<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shop.list.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($shop)
    {
        $shop = Shop::find($shop);
        return view('shop.edit', compact(['shop']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shop)
    {
        

        $shop = Shop::find($shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop)
    {
        //
    }
}
