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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::all();
            return datatables()->of($categories)
            ->editColumn('image', function(Category $category) {
                if($category->image) {
                    return '<img src="'. asset('storage/uploads/'.$category->image.'') .'" alt="'.$category->name.'" width="40" height="40">';
                }
                return '<img src="'. asset("themes/admin/img/placeholder.png") .'" alt="'.$category->name.'" width="40" height="40">';
            })
            ->editColumn('name', function(Category $category) {
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
            ->editColumn('products', function(Category $category) {
                return '<a href="#" class="font-weight-bold">0</a>';
            })
            ->rawColumns(['image', 'name', 'products'])
            ->toJson();
        }
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $request->merge(['slug' => Str::slug($request->slug)]);

        if(isset($request->photo)) {
            $photoname = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('storage/uploads'), $photoname);
            $request->merge(['image' => $photoname]);
        }
        
        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('status', 'Category has created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($category)],
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $request->merge(['slug' => Str::slug($request->slug)]);

        if(isset($request->photo)) {
            $photoname = $category->image ?? time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('storage/uploads'), $photoname);
            $request->merge(['image' => $photoname]);
        }
        
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('status', 'Category has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->id === 1) {
            return response()->json(['error' => 'Failed to delete category.'], 400);
        }

        if($category->image) {
            unlink(public_path('storage/uploads/' . $category->image));
        }
        $category->delete();
        return response()->json(['status' => 'Category has deleted successfully.']);
    }

    /**
     * Remove all the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_bulk(Request $request)
    {
        Category::whereIn('id', $request->id)->delete();

        return response()->json(['status' => 'Categories have deleted successfully.']);
    }
}
