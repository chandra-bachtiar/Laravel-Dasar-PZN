<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/chand', function () {
    return "Hello Chand!";
});

Route::redirect('/bachtiar', '/chand');

Route::fallback(function () {
    return "404:Not Found!";
});

Route::view('/hello', 'hello', ["name" => 'Hello Chand']);

Route::get('/hello-chand', function () {
    return view('hello', ["name" => "Hello Chand!"]);
});

Route::view('/world', 'hello.world', ["name" => 'World Chand']);

Route::get('/world-chand', function () {
    return view('hello.world', ["name" => "World Chand!"]);
});

Route::get('/barang/{id}', function ($id) {
    return "Your ProductId is $id";
})->name('barang.detail');

Route::get('/barang/{id}/merk/{merk}', function ($id, $merk) {
    return "Your ProductId $id Merk $merk";
});

Route::get('/kategori/{id}', function ($id) {
    return "Kategori : $id";
})->where('id','[a-z]+')->name('kategori.detail');

Route::get('/kategori/{id}/sub/{sub}', function ($id,$sub) {
    return "Kategori : $id Sub : $sub";
})->where('id','[a-z]+')->where('sub','[0-9]+');

Route::get('/customer/{id?}',function(string $customer="C01") {
    return "Customer : $customer";
});

Route::get('/conflic/chand',function($name){
    return "Name Chandra bachtiar";
});

Route::get('/conflic/{name}',function($name){
    return "Name $name";
});

Route::get('/produk/{id}',function($id){
    $link = route('barang.detail',["id"=> $id]);
    return "Link $link";
});

Route::get('kat/{id}',function($id){
    return redirect()->route('kategori.detail',["id"=> $id]);
});