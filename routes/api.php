<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//User Routes
Route::post('/user', 'UserController@create');
Route::get('/user/{id}', 'UserController@get');

//Playlist Routes
Route::post('/playlist', 'PlaylistController@create');
Route::get('/playlist/{user_id}/{playlist_id}', 'PlaylistController@get');

//Playlist Item Routes
Route::post('/item', 'PlaylistItemController@create');

//Load Data to Play Item Route
Route::post('/item/request/stream/link', 'StreamLinkController@request_stream_link');
