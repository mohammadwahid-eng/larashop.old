<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
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
            return datatables()->of(ProductAttribute::all())
            ->editColumn('name', function($attribute) {
                $html = '<a href="'. route("admin.attributes.show", $attribute) .'">'.$attribute->name.'</a>';
                $html .= '<div class="table-links">';
                    $html .= '<span" class="text-muted btn-view">ID: '.$attribute->id.'</span>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.attributes.edit", $attribute) .'" class="btn-edit">Edit</a>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.attributes.destroy", $attribute) .'" class="text-danger btn-delete">Delete</a>';
                $html .= '</div>';
                return $html;
            })
            ->editColumn('values', function($attribute) {
                return '<a href="#" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['name', 'values'])
            ->toJson();
        }
        return view('catalogue.attributes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogue.attributes.create');
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
            'slug'        => 'required|string|max:255|unique:product_attributes',
            'description' => 'nullable|string',
        ]);

        ProductAttribute::create($request->all());

        return redirect()->route('admin.attributes.index')->with('status', 'Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $attribute)
    {
        return view('catalogue.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $attribute)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('product_attributes')->ignore($attribute)],
            'description' => 'nullable|string',
        ]);

        $attribute->update($request->all());

        return redirect()->route('admin.attributes.index')->with('status', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $attribute)
    {
        $attribute->delete();
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
            $this->destroy(ProductAttribute::find($id));
        }
        return response()->json(['status' => 'Records have been deleted']);
    }
}
