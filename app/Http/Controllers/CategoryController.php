<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('products.categories.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.categories.add');
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
            'slug'        => 'required|string|max:255|unique:categories',
            'parent_id'   => 'required',
            'featured'    => 'required',
            'menu'        => 'required',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->featured = $request->featured;
        $category->menu = $request->menu;

        if(isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/uploads'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.products.categories.index')->with('status', 'Category Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = Category::find($category);
        return view('products.categories.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($category)],
            'parent_id'   => 'required',
            'featured'    => 'required',
            'menu'        => 'required',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $category = Category::find($category);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->featured = $request->featured;
        $category->menu = $request->menu;

        if(isset($request->image)) {
            $imageName = $category->image ?? time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/uploads'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.products.categories.index')->with('status', 'Category has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $cat = Category::find($category);
        if($cat->image) {
            unlink(public_path('storage/uploads/' . $cat->image));
        }
        $cat->delete();
        return back()->with('status', 'Category has deleted successfully.');
    }
}
