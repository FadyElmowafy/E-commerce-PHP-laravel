<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

//npm run dev
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("redirect",[HomeController::class,"redirect"])->name("redirect")->middleware("auth");

Route::controller(ProductController::class)->group(function(){

    Route::middleware("is_admin" , "auth")->group(function(){
    Route::get("products","all");
    Route::get("product/show/{id}",'show');

    Route::get("product/create","createProduct");
    Route::post("product/create","storeProduct");

    Route::get("product/edit/{id}","editProduct");
    Route::post("product/edit","updateProduct");

    Route::get("product/delete/{id}","deleteProduct");
    });
});

Route::get("change/{lang}",[HomeController::class, "changeLang"]);