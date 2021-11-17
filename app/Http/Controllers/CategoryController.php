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
        if($request->ajax()) {
            $categories = Category::all();
            return datatables()->of($categories)
                ->editColumn('id', function($category) {
                    $checkbox = '<div class="custom-checkbox custom-control">';
                        $checkbox .= '<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-'.$category->id.'" name="attributes[]">';
                        $checkbox .= '<label for="checkbox-'.$category->id.'" class="custom-control-label">&nbsp;</label>';
                    $checkbox .= '</div>';
                    return $checkbox;
                })
                ->editColumn('image', function($category) {
                    if($category->image) {
                        return '<img src="'.asset('storage/uploads/'.$category->image.'').'" alt="'.$category->name.'" width="30">';
                    } else {
                        return '<img src="'.asset('themes/admin/img/placeholder.png').'" alt="'.$category->name.'" width="30">';
                    }
                })
                ->editColumn('is_featured', function($category) {
                    return $category->is_featured ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
                })
                ->editColumn('in_menu', function($category) {
                    return $category->in_menu ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
                })
                ->addColumn('products', function($category){
                    return '<a href="#"><strong>0</strong></a>';
                })
                ->addColumn('action', function($category){
					$html = '<a href="'.route('admin.catalogue.categories.edit', $category).'" class="btn btn-sm btn-light btn-edit">'.__("Edit").'</a>';
					if($category->id !== 1) {
						$html .= '&nbsp;';
						$html .= '<a href="'.route('admin.catalogue.categories.destroy', $category).'" data-id="'.$category->id.'" class="btn btn-sm btn-danger btn-delete">'.__("Delete").'</a>';
					}
					return $html;
                })
                ->rawColumns(['id', 'image', 'is_featured', 'in_menu', 'products', 'action'])
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
        return view('catalogue.categories.add');
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
            'slug'        => 'nullable|string|max:255|unique:categories',
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'is_featured' => 'required',
            'in_menu'     => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $category              = new Category();
        $category->name        = $request->name;
        $category->slug        = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $category->parent_id   = $request->parent_id;
        $category->description = $request->description;
        $category->is_featured = $request->is_featured;
        $category->in_menu     = $request->in_menu;

        if(isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/uploads'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('admin.catalogue.categories.index')->with('status', 'Category Added successfully.');
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
        return view('catalogue.categories.edit', compact('category'));
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
            'name'        => 'required|string|max:255',
            'slug'        => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($category)],
            'parent_id'   => 'nullable',
            'description' => 'nullable|string',
            'is_featured' => 'required',
            'in_menu'     => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $cat              = Category::find($category);
        $cat->name        = $request->name;
        $cat->slug        = $request->slug;
        $cat->parent_id   = $request->parent_id;
        $cat->description = $request->description;
        $cat->is_featured = $request->is_featured;
        $cat->in_menu     = $request->in_menu;

        if(isset($request->image)) {
            $imageName = $category->image ?? time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/uploads'), $imageName);
            $cat->image = $imageName;
        }

        $cat->save();

        return redirect()->route('admin.catalogue.categories.index')->with('status', 'Category has updated successfully.');
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
		if($cat->id === 1) {
			return redirect()->route('admin.catalogue.categories.index')->with('status', $cat->name . ' can not be deleted');
		}

        if($cat->image) {
            unlink(public_path('storage/uploads/' . $cat->image));
        }
        $cat->delete();
        return redirect()->route('admin.catalogue.categories.index')->with('status', 'Category has deleted successfully.');
    }
    
}
