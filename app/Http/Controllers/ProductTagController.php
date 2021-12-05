<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of(ProductTag::all())
            ->editColumn('name', function($tag) {
                $html = '<a href="'. route("admin.tags.show", $tag) .'">'.$tag->name.'</a>';
                $html .= '<div class="table-links">';
                    $html .= '<span" class="text-muted btn-view">ID: '.$tag->id.'</span>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.tags.edit", $tag) .'" class="btn-edit">Edit</a>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.tags.destroy", $tag) .'" class="text-danger btn-delete">Delete</a>';
                $html .= '</div>';
                return $html;
            })
            ->editColumn('products', function($tag) {
                return '<a href="#" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['name', 'products'])
            ->toJson();
        }
        return view('catalogue.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogue.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:product_tags',
            'description' => 'nullable|string',
        ]);

        ProductTag::create($request->all());

        return redirect()->route('admin.tags.index')->with('status', 'Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTag $tag)
    {
        return view('catalogue.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTag $tag)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('product_tags')->ignore($tag)],
            'description' => 'nullable|string',
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('status', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTag $tag)
    {
        $tag->delete();
        return response()->json(['status' => 'Record has been deleted']);
    }

    /**
     * Remove all the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_bulk(Request $request)
    {
        foreach($request->id as $id) {
            $this->destroy(ProductTag::find($id));
        }
        return response()->json(['status' => 'Records have been deleted']);
    }
}
