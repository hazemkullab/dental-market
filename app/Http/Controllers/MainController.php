<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->take(5)->get();
        $latest_dealers=Dealer::latest()->take(3)->get();
        $dealers=Dealer::all();
        return view('front.index', compact('categories','dealers','latest_dealers'));
    }

    public function category($slug)
    {
        $category=Category::where('slug',$slug)->first();
        $title=$category->trans_name;
        $dealers = Dealer::where('category_id',$category->id)->paginate(6);

        return view('front.dealers',compact('title','dealers'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function dealers()
    {

        $title='All Dealers';
        $dealers = Dealer::paginate(6);
        return view('front.dealers',compact('title','dealers',));

    }

        public function products()
    {

        $title='All Products';
        $products = Product::paginate(6);
        return view('front.dealers',compact('title','products'));

    }

    public function dealers_single($slug)
    {
        $dealer = Dealer::with('products','category')->withCount('products')->where('slug', $slug)->firstOrFail();
        $category=$dealer->category_id;
        $related_dealers = Dealer::where('category_id',$category)
        ->where('id','<>',$dealer->id)
        ->latest()
        ->limit(3)
        ->get();
        $products = Product::where('dealer_id',$dealer->id)->paginate(6);
        return view ('front.dealer_single',compact('dealer','products','related_dealers'));
    }

    public function products_single($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $dealer=$product->dealer_id;
        $related_products = Product::where('dealer_id',$dealer)
        ->where('id','<>',$product->id)
        ->latest()
        ->limit(3)
        ->get();
        return view('front.product_single',compact('product','related_products'));
    }

    public function login()
    {
        return view('front.login');
    }

    public function buy_product(Product $product)
    {
        return view('front.buy_product', compact('product'));
    }

}
