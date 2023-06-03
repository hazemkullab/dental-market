<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dealer;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        $type ='index';
        return view('admin.products.index',compact('products','type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dealers = Dealer::select('id','name')->get();
        $product= new Product();
        return view('admin.products.create', compact('dealers','product'));
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
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
            'dealer_id'=>'required|exists:dealers,id'
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

        Product::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'slug'=>Str::slug($request->name_en),
            'excerpt'=>json_encode($excerpt,JSON_UNESCAPED_UNICODE),
            'content'=>json_encode($content,JSON_UNESCAPED_UNICODE),
            'image'=>$imagename,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'dealer_id'=>$request->dealer_id


        ]);

    return redirect()
    ->route('admin.products.index')
    ->with('msg','Proeduct added')
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
        $dealers = Dealer::select('id','name')->get();
        $product= Product::findOrFail($id);
        return view('admin.products.edit', compact('dealers','product'));
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
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric',
            'dealer_id'=>'required|exists:dealers,id'
        ]);
        $product= Product::findOrFail($id);
        $imagename=$product->image;
     if ($request->hasFile('image')) {
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

        $product->update([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'slug'=>Str::slug($request->name_en),
            'excerpt'=>json_encode($excerpt,JSON_UNESCAPED_UNICODE),
            'content'=>json_encode($content,JSON_UNESCAPED_UNICODE),
            'image'=>$imagename,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'dealer_id'=>$request->dealer_id


        ]);

    return redirect()
    ->route('admin.products.index')
    ->with('msg','Product updated')
    ->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()
            ->route('admin.products.index')
            ->with('msg','Product removed')
            ->with('type','info');
    }

    /**
     * Display a listing of trashed resource.
     */
    public function trash()
    {
        $products = Product::onlyTrashed()->latest()->get();
        $type ='trash';
        return view('admin.products.index',compact('products','type'));
    }

        /**
     * restore the specified resource from storage.
     */
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()
              ->route('admin.products.index')
              ->with('msg','Product Untrashed')
              ->with('type','success');
    }

          /**
     * forceDelete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        Product::withTrashed()->find($id)->forceDelete();
        return redirect()
              ->route('admin.products.index')
              ->with('msg','Product  perma deleted')
              ->with('type','danger');
    }
}

