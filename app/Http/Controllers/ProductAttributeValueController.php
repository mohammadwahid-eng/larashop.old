<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ProductAttribute $attribute)
    {
        if ($request->ajax()) {
            return datatables()->of($attribute->attr_values)
            ->editColumn('name', function($value) use($attribute) {
                $html = '<a href="'. route("admin.attributes.values.show", [$attribute, $value]) .'">'.$value->name.'</a>';
                $html .= '<div class="table-links">';
                    $html .= '<span" class="text-muted btn-view">ID: '.$value->id.'</span>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.attributes.values.edit", [$attribute, $value]) .'" class="btn-edit">Edit</a>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.attributes.values.destroy", [$attribute, $value]) .'" class="text-danger btn-delete">Delete</a>';
                $html .= '</div>';
                return $html;
            })
            ->editColumn('products', function($value) {
                return '<a href="/" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['name', 'products'])
            ->toJson();
        }
        return view('catalogue.attributes.values.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function create(ProductAttribute $attribute)
    {
        return view('catalogue.attributes.values.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAttribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProductAttribute $attribute)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_attribute_values')->where(function ($value) use($request) {
                    return $value->where('slug', $request->slug)->where('attribute_id', $request->attribute_id);
                }),
            ],
            'description' => 'nullable|string',
        ]);

        ProductAttributeValue::create($request->all());

        return redirect()->route('admin.attributes.values.index', $attribute)->with('status', 'Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAttributeValue  $value
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttributeValue $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $attribute
     * @param  \App\Models\ProductAttributeValue  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $attribute, ProductAttributeValue $value)
    {
        return view('catalogue.attributes.values.edit', compact('attribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAttribute  $attribute
     * @param  \App\Models\ProductAttributeValue  $value
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $attribute, ProductAttributeValue $value)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_attribute_values')->where(function ($value) use($request) {
                    return $value->where('slug', $request->slug)->where('attribute_id', $request->attribute_id);
                })->ignore($value),
            ],
            'description' => 'nullable|string',
        ]);

        $value->update($request->all());

        return redirect()->route('admin.attributes.values.index', $attribute)->with('status', 'Record has been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute $attribute
     * @param  \App\Models\ProductAttributeValue $value
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $attribute, ProductAttributeValue $value)
    {
        $value->delete();
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
        foreach($request->values as $item) {
            $this->destroy(ProductAttribute::find($item['attribute']), ProductAttributeValue::find($item['value']));
        }
        return response()->json(['status' => 'Records have been deleted']);
    }
}
