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

//category
Route::post('categories/store', 'CategoryAPIController@store');
Route::put('categories/update', 'CategoryAPIController@update');
Route::delete('categories/destroy', 'CategoryAPIController@destroy');
//role
Route::post('roles/store', 'RoleAPIController@store');
Route::put('roles/update', 'RoleAPIController@update');
Route::delete('roles/destroy', 'RoleAPIController@destroy');
//user
Route::post('users/store', 'UserAPIController@store');
Route::put('users/update', 'UserAPIController@update');
Route::delete('users/destroy', 'UserAPIController@destroy');
//comment
Route::post('comments/store', 'CommentAPIController@store');
Route::put('comments/update', 'CommentAPIController@update');
Route::delete('comments/destroy', 'CommentAPIController@destroy');
//post
Route::post('posts/store', 'PostAPIController@store');
Route::put('posts/update', 'PostAPIController@update');
Route::delete('posts/destroy', 'PostAPIController@destroy');
//country
Route::post('countries/store', 'CountryAPIController@store');
Route::put('countries/update', 'CountryAPIController@update');
Route::delete('countries/destroy', 'CountryAPIController@destroy');
//restaurantcd
Route::post('restaurants/store', 'RestaurantAPIController@store');
Route::put('restaurants/update', 'RestaurantAPIController@update');
Route::delete('restaurants/destroy', 'RestaurantAPIController@destroy');
Route::get('restaurants/showposts/{id}', 'RestaurantAPIController@showposts');
Route::get('restaurants/showcategory/{id}', 'RestaurantAPIController@showcategory');
Route::get('restaurants/showCountry/{id}', 'RestaurantAPIController@showCountry');
