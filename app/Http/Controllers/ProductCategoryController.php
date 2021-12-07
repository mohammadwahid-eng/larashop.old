<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCategoryController extends Controller
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
            return datatables()->of(ProductCategory::all())
            ->editColumn('image', function($category) {
                if($category->getFirstMedia()) {
                    return '<img src="'. $category->getFirstMediaUrl() .'" alt="'. $category->getFirstMedia()->name .'" width="40" height="40">';
                }
                return '<img src="'. asset("themes/admin/img/placeholder.png") .'" alt="'.$category->name.'" width="40" height="40">';
            })
            ->editColumn('name', function($category) {
                $html = '<a href="'. route("admin.categories.show", $category) .'">'.$category->name.'</a>';
                $html .= '<div class="table-links">';
                    $html .= '<span" class="text-muted btn-view">ID: '.$category->id.'</span>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.categories.edit", $category) .'" class="btn-edit">Edit</a>';
                    $html .= '<div class="bullet"></div>';
                    $html .= '<a href="'. route("admin.categories.destroy", $category) .'" class="text-danger btn-delete">Delete</a>';
                $html .= '</div>';
                return $html;
            })
            ->editColumn('products', function($category) {
                return '<a href="#" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['image', 'name', 'products'])
            ->toJson();
        }
        return view('catalogue.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogue.categories.create');
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
            'slug'        => 'required|string|max:255|unique:product_categories',
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $category = ProductCategory::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->addMedia($request->file('image'))->toMediaCollection();
        }

        return redirect()->route('admin.categories.index')->with('status', 'Record has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        return view('catalogue.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('product_categories')->ignore($category)],
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->clearMediaCollection();
            $category->addMedia($request->file('image'))->toMediaCollection();
        }

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('status', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();
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
            $this->destroy(ProductCategory::find($id));
        }
        return response()->json(['status' => 'Records have been deleted']);
    }
}
