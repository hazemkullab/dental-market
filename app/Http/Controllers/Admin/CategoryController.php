<?php

namespace App\Http\Controllers\Admin;

use id;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
                $type ='index';
        return view('admin.categories.index',compact('categories','type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        $category = new Category();
        return view('admin.categories.create',compact('categories','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' =>'required',
            'name_ar' =>'required',
    ]);



    $name=[
        'en'=> $request->name_en,
        'ar'=> $request->name_ar,

    ];

    category::create([
        'name'=> json_encode($name,JSON_UNESCAPED_UNICODE),
        'slug'=> Str::slug($request->name_en),
        'parent_id' => $request->parent_id,  
        // $parent_id->parent_id = $request->input('parent_id')
    ]);

    return redirect()
    ->route('admin.categories.index')
    ->with('msg','Category added')
    ->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
        $categories = Category::select('id','name')->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
            'name_en' =>'required',
            'name_ar' =>'required',
    ]);



    $name=[
        'en'=> $request->name_en,
        'ar'=> $request->name_ar,

    ];

    category::findOrFail($id)->update([
        'name'=> json_encode($name,JSON_UNESCAPED_UNICODE),
        'slug'=> Str::slug($request->name_en),
        'parent_id' => $request->parent_id,  
        // $parent_id->parent_id = $request->input('parent_id')
    ]);

    return redirect()
    ->route('admin.categories.index')
    ->with('msg','Category updated')
    ->with('type','warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()
            ->route('admin.categories.index')
            ->with('msg','Category removed')
            ->with('type','info');
    }
    
    /**
     * Display a listing of trashed resource.
     */
    public function trash()
    {
        $categories = Category::onlyTrashed()->latest()->get();
        $type ='trash';
        return view('admin.categories.index',compact('categories','type'));
    }

        /**
     * restore the specified resource from storage.
     */
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return redirect()
              ->route('admin.categories.index')
              ->with('msg','Category Untrashed')
              ->with('type','success');
    }

          /**
     * forceDelete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        Category::withTrashed()->find($id)->forceDelete();
        return redirect()
              ->route('admin.categories.index')
              ->with('msg','Category  perma deleted')
              ->with('type','danger');
    }
}

