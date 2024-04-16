<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ecommercecontroller;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product',[Ecommercecontroller::class , 'index'])->name('pro.index');
Route::get('/create',[Ecommercecontroller::class , 'create'])->name('product.create');
Route::post('/pro',[Ecommercecontroller::class , 'store'])->name('pro.store');
Route::delete('/delete/{id}',[Ecommercecontroller::class , 'destroy'])->name('product.destroy');
Route::get('/edit/{id}',[Ecommercecontroller::class , 'edit'])->name('product.edit');
Route::put('/update/{id}',[Ecommercecontroller::class , 'update'])->name('product.update');
