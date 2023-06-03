<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dealer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\NewPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->take(5)->get();
        $dealers_cat=Dealer::latest()->take(5)->get();
        $latest_dealers=Dealer::latest()->take(3)->get();
        $dealers=Dealer::all();
        $products=Product::latest()->take(3)->get();
        return view('front.index', compact('categories','dealers','latest_dealers','products','dealers_cat'));
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
        // $user=User::where('email','haz@gmail.com')->first();
        // $user->notify(new NewPayment);
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

        $price = $product->price;
        $discount= $price * ($product->discount / 100);
        $total = $price - $discount;
        	$url = "https://eu-test.oppwa.com/v1/checkouts";
            $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                        // "&amount=" . $product->price - $product->discount .
                        "&amount=" . $total.
                        "&currency=USD" .
                        "&paymentType=DB";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $responseData= json_decode($responseData,true);
            $checkoutId = $responseData['id'];


        return view('front.buy_product', compact('product','checkoutId'));
    }

    public function buy_product_thanks($id)
    {
        $product = Product::findOrFail($id);
        $resourcePath = request()->resourcePath;
            $url = "https://eu-test.oppwa.com".$resourcePath;
            $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $responseData = json_decode($responseData,true);
            $code = $responseData['result']['code'];

            $valid = ['000.000.000','000.000.100','000.100.105','000.100.106','000.100.110','000.100.111','000.100.112'];
            if(in_array($code , $valid)){

                //register product

                DB::table('user_product')->insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$id
                ]);

                //show success massage
                return redirect()->route('website.products_single',$product->slug)->with('msg','payment success')->with('type','success');
            }else{

            //show error massage
                return redirect()->route('website.products_single',$product->slug)->with('msg','payment faild')->with('type','danger');

            }
        }

        public function my_products()
        {

        $title='My Products';
        $products = Auth::user()->products()->paginate(6);
        return view('front.products',compact('title','products'));

        }
    }

