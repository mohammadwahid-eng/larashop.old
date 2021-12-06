<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            return datatables()->of(Product::all())
            ->editColumn('image', function($product) {
                if($product->getFirstMedia()) {
                    return '<img src="'. $product->getFirstMediaUrl() .'" alt="'. $product->getFirstMedia()->name .'" width="40" height="40">';
                }
                return '<img src="'. asset("themes/admin/img/placeholder.png") .'" alt="'.$product->name.'" width="40" height="40">';
            })
            ->editColumn('name', function($product) {
                $html = '<a href="'. route("admin.products.show", $product) .'">'.$product->name.'</a>';
                $html .= '<div class="table-links">';
                    $html .= '<span" class="text-muted btn-view">ID: '.$product->id.'</span>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.products.edit", $product) .'" class="btn-edit">Edit</a>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.products.destroy", $product) .'" class="text-danger btn-delete">Delete</a>';
                $html .= '</div>';
                return $html;
            })
            ->editColumn('products', function($product) {
                return '<a href="#" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['image', 'name', 'products'])
            ->toJson();
        }
        return view('catalogue.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogue.products.create');
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
            'slug'        => 'required|string|max:255|unique:products',
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $product = Product::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMedia($request->file('image'))->toMediaCollection();
        }

        return redirect()->route('admin.products.index')->with('status', 'Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('catalogue.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product)],
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $product->clearMediaCollection();
            $product->addMedia($request->file('image'))->toMediaCollection();
        }

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('status', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
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
            $this->destroy(Product::find($id));
        }
        return response()->json(['status' => 'Records have been deleted']);
    }
}
