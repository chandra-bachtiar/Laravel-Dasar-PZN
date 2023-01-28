<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Services\HelloService;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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

Route::get('/controller/hello/{name}',[HelloController::class,'helo']);

Route::get('/controller/hallo',[HelloController::class,'halo']);

Route::get('/controller/hello-request',[HelloController::class,'request']);

//input controller
Route::get('/input/hello',[InputController::class,'hello']);

Route::post('/input/hello',[InputController::class,'hello']);

Route::post('/input/hello-first',[InputController::class,'helloFirst']);

Route::post('/input/hello-input',[InputController::class,'helloInput']);

Route::post('/input/hello-product',[InputController::class,'helloProduct']);

//input type
Route::post('/input/hello-type',[InputController::class,'helloInputType']);

//input type filter
Route::post("/input/filter-only",[InputController::class,'helloInputFilterOnly']);
Route::post("/input/filter-except",[InputController::class,'helloInputFilterExcept']);
Route::post('/input/merge',[InputController::class,'helloInputMerge']);
