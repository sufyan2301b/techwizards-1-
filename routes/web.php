<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;

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
    return view('index');
});


Route::post('/abc',[mycontroller::class,('insertdata')]);
Route::post('/updprod',[mycontroller::class,('insertproduct')]);
Route::get('/fetch',[mycontroller::class,('getdata')]);

Route::post('/del/{id}',[mycontroller::class,('delrecord')]);
Route::post('/upd/{id}',[mycontroller::class,('updateuser')]);
Route::post('/updaterecord',[mycontroller::class,('update')]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
       if(Auth::User()->role == 1)
       {
        return view('index');
       }
       else{
        return view('AdminDashboard.index');
       }
    })->name('dashboard');

    Route::get('/upload', function () {
        return view('AdminDashboard.uploadproduct');
    });
    Route::get('/prods',[mycontroller::class,('getproducts')]);

    Route::get('/checkout',[mycontroller::class,('checkout')]);
    Route::post('/deleteproduct/{id}',[mycontroller::class,('deleteproduct')]);
});
Route::post('/insprod',[mycontroller::class,('insertproducts')]);
