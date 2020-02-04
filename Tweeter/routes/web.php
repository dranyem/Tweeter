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
Route::get('/profile/setup', 'ProfileController@show');
Route::post('/profile/setup', 'ProfileController@createProfile');
Route::get('/follows', 'FollowController@show');
Route::get('/follows/followUser', 'FollowController@follow');
Route::get('/follows/unfollowUser', 'FollowController@unfollow');


