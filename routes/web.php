<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
// use App\Http\Controllers\Admin\DealerController;
// use App\Http\Controllers\Admin\DealersController;
use App\Http\Controllers\Admin\DealersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth','admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
// category routes
    Route::get('categories/trash',[CategoryController::class,'trash'])->name('categories.trash');
    Route::get('categories/{id}/restore',[CategoryController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forcedelete',[CategoryController::class,'forcedelete'])->name('categories.forceDelete');
    Route::resource('categories', CategoryController::class);

// Dealers routes
    Route::get('dealers/trash',[DealersController::class,'trash'])->name('dealers.trash');
    Route::get('dealers/{id}/restore',[DealersController::class,'restore'])->name('dealers.restore');
    Route::delete('dealers/{id}/forcedelete',[DealersController::class,'forcedelete'])->name('dealers.forceDelete');
    Route::resource('dealers', DealersController::class);


    // Products routes
    Route::get('products/trash',[ProductController::class,'trash'])->name('products.trash');
    Route::get('products/{id}/restore',[ProductController::class,'restore'])->name('products.restore');
    Route::delete('products/{id}/forcedelete',[ProductController::class,'forcedelete'])->name('products.forceDelete');
    Route::resource('products', ProductController::class);

});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()

{

Route::get('/', [MainController::class,'index'] )->name('website.index');
Route::get('/category/{slug}',[MainController::class, 'category'])->name('website.category');
Route::get('/about',[MainController::class, 'about'])->name('website.about');
Route::get('/contact',[MainController::class, 'contact'])->name('website.contact');
Route::get('/dealers',[MainController::class, 'dealers'])->name('website.dealers');
Route::get('/products',[MainController::class, 'products'])->name('website.products');
Route::get('/dealers/{slug}',[MainController::class, 'dealers_single'])->name('website.dealers_single');
Route::get('/products/{slug}',[MainController::class, 'products_single'])->name('website.products_single');
Route::get('/buy_product/{product:slug}',[MainController::class, 'buy_product'])->name('website.buy_product');
Route::get('/buy_product/{id}/thanks',[MainController::class, 'buy_product_thanks'])->name('website.buy_product_thanks');
Route::get('/my-products',[MainController::class, 'my_products'])->name('website.my_products');
Route::get('/products/{slug}/private',[MainController::class, 'products_private'])->name('website.products_private');
Route::get('/user/login',[MainController::class, 'login'])->name('website.login');



});

// Route::get('/', function () {
//     return view('welcome');
// })->name('website.index');


