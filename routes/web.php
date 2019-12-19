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

Route::get('/test/create/user', function() {
	return view('test.create.user');
});

Route::get('/test/create/item', function() {
	return view('test.create.item');
});

Route::get('/test/play/item', function() {
	return view('test.play.item');
});
