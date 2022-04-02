<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeamController;
use App\Models\Slider;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $slide = Slider::first();
    if ($slide !== null) {
        # code...
        $slider = Slider::all()->except($slide->id);
    }else {
        # code...
        $slider = Slider::all();
    }
    
    return view('fe.raw',compact('slider','slide'));
    // return view('layouts.raw_backend');
    // return view('be.slider');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'CheckRole:admin,superadmin']], function () {

Route::get('/slider-page',[SliderController::class,'page_slider'])->name('slider.page');
Route::post('/slider-post',[SliderController::class,'store_slider'])->name('slider.store');
Route::post('/slider-delete',[SliderController::class,'delete_slider'])->name('slider.delete');
Route::post('/slider-update',[SliderController::class,'update_slider'])->name('slider.update');

Route::get('/profile-page',[ProfileController::class,'page_profile'])->name('profile.page');
Route::post('/profile-post',[ProfileController::class,'store_profile'])->name('profile.store');

Route::get('/about-page',[ProfileController::class,'page_about'])->name('about.page');
Route::post('/about-post',[ProfileController::class,'store_about'])->name('about.store');

Route::get('/jenis-product-page',[ProductController::class,'page_jenis'])->name('jenis.page');
Route::post('/jenis-post',[ProductController::class,'store_jenis'])->name('jenis.store');
Route::post('/jenis-delete',[ProductController::class,'delete_jenis'])->name('jenis.delete');

Route::get('/product-page',[ProductController::class,'page_product'])->name('product.page');
Route::post('/product-post',[ProductController::class,'store_product'])->name('product.store');
Route::post('/product-delete',[ProductController::class,'delete_product'])->name('product.delete');

Route::get('/team-page',[TeamController::class,'page_team'])->name('team.page');
Route::post('/team-store',[TeamController::class,'store_team'])->name('team.store');
Route::post('/team-delete',[TeamController::class,'delete_team'])->name('team.delete');
Route::post('/sosmed-post',[TeamController::class,'store_sosmed'])->name('sosmed.store');
Route::post('/sosmed-delete',[TeamController::class,'delete_sosmed'])->name('sosmed.delete');

});