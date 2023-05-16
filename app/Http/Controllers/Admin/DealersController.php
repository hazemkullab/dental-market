<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dealer;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dealers = Dealer::latest()->get();
        $type ='index';
        return response()->view('admin.dealers.index',compact('dealers','type'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $dealer = new Dealer();
        return view('admin.dealers.create',compact('categories','dealer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'=> 'required',
            'name_ar'=>'required',
            'en_content'=>'required|min:20',
            'ar_content'=>'required|min:20',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'category_id'=>'required'
        ]);

        //uplode file
        $imagename=time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'),$imagename);

        $name=[
            'en'=>$request->name_en,
            'ar'=>$request->name_ar

        ];
        $excerpt=[
            'en'=>$request->en_excerpt,
            'ar'=>$request->ar_excerpt

        ];
        $content=[
            'en'=>$request->en_content,
            'ar'=>$request->ar_content

        ];

        Dealer::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'slug'=>Str::slug($request->name_en),
            'excerpt'=>json_encode($excerpt,JSON_UNESCAPED_UNICODE),
            'content'=>json_encode($content,JSON_UNESCAPED_UNICODE),
            'image'=>$imagename,
            'category_id'=>$request->category_id


        ]);

    return redirect()
    ->route('admin.dealers.index')
    ->with('msg','Dealer added')
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
        $dealer=Dealer::findOrFail($id);
        $categories = Category::select('id','name')->get();
        return view('admin.dealers.edit',compact('dealer','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_en'=> 'required',
            'name_ar'=>'required',
            'en_content'=>'required|min:20',
            'ar_content'=>'required|min:20',
            'image'=>'nullable',
            'category_id'=>'required'
        ]);
        $dealer=Dealer::findOrFail($id);
        $imagename=$dealer->image;
        if ($request->hasfile('image'))
        {
        //uplode file
        $imagename=time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'),$imagename);

        }

        $name=[
            'en'=>$request->name_en,
            'ar'=>$request->name_ar

        ];
        $excerpt=[
            'en'=>$request->en_excerpt,
            'ar'=>$request->ar_excerpt

        ];
        $content=[
            'en'=>$request->en_content,
            'ar'=>$request->ar_content

        ];

        $dealer->update([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'excerpt'=>json_encode($excerpt,JSON_UNESCAPED_UNICODE),
            'content'=>json_encode($content,JSON_UNESCAPED_UNICODE),
            'image'=>$imagename,
            'category_id'=>$request->category_id


        ]);

    return redirect()
    ->route('admin.dealers.index')
    ->with('msg','Dealer updateed')
    ->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dealer::destroy($id);
        return redirect()
            ->route('admin.dealers.index')
            ->with('msg','Dealer removed')
            ->with('type','info');
    }

    /**
     * Display a listing of trashed resource.
     */
    public function trash()
    {
        $dealers = Dealer::onlyTrashed()->latest()->get();
        $type ='trash';
        return view('admin.dealers.index',compact('dealers','type'));
    }

        /**
     * restore the specified resource from storage.
     */
    public function restore($id)
    {
        Dealer::withTrashed()->find($id)->restore();
        return redirect()
              ->route('admin.dealers.index')
              ->with('msg','Dealer Untrashed')
              ->with('type','success');
    }

          /**
     * forceDelete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        Dealer::withTrashed()->find($id)->forceDelete();
        return redirect()
              ->route('admin.dealers.index')
              ->with('msg','Dealer  perma deleted')
              ->with('type','danger');
    }
}

