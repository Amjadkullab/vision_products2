<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagecontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

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

Route::get('/',[pagecontroller::class,'index'])->name('homepage');
Route::get('/services',[pagecontroller::class,'services'])->name('services');
Route::get('/portfolio',[pagecontroller::class,'portfolio'])->name('portfolio');
Route::get('/about',[pagecontroller::class,'about'])->name('about');
Route::get('/team',[pagecontroller::class,'team'])->name('team');
Route::get('/contact',[pagecontroller::class,'contact'])->name('contact');
Route::post('/contact',[pagecontroller::class,'contactsubmit'])->name('contact');






Route::prefix('admin')->group(function(){

    Route::get('/',[admincontroller::class,'index'])->name('admin.index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/clients',ClientController::class);
    Route::resource('/products',ProductController::class);



});




Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
