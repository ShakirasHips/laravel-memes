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


Route::get('showRestaurant/{id}', 'RestaurantController@show');
Route::get('showCountry/{id}', 'CountriesController@show');
Route::get('showCategory/{id}', 'CategoriesController@show');
Route::get('showUser/{id}', 'UsersController@show');
Route::resource('restaurants', 'RestaurantController');
Route::resource('countries', 'CountriesController');
Route::resource('categories', 'CategoriesController');
Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController');
Route::get('addPostFromRestaurant', 'PostsController@addFromRestaurant');
