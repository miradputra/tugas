<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view('backend');
    

});
Route::get('/archive', function () {
    return view('archive');
});
Route::get('/category', function () {
    return view('category');
});
    Route::get('/elements', function () {
    return view('elements');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/post-details', function () {
    return view('post-details');
});