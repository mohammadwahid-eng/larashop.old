<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('products.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.attributes.add');
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
     * @param  object  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($attribute)
    {
        $attribute = Attribute::find($attribute);
        return view('products.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($attribute)
    {
        //
    }
}
