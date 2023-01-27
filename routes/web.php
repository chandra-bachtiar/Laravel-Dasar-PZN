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

Route::get('/chand', function() {
    return "Hello Chand!";
});

Route::redirect('/bachtiar','/chand');

Route::fallback(function(){
    return "404:Not Found!";
});

Route::view('/hello','hello', ["name"=>'Hello Chand']);

Route::get('/hello-chand',function(){
    return view('hello',["name"=>"Hello Chand!"]);
});

Route::view('/world','hello.world', ["name"=>'World Chand']);

Route::get('/world-chand',function(){
    return view('hello.world',["name"=>"World Chand!"]);
});