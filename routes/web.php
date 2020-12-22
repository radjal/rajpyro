<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
 
Route::get('/error503', function () {
    return view("templates::errors/503");
    
});

Route::get('/test', function () {
    $arr = ['one','two'];
    return $arr;
//    return view('welcome');
});
