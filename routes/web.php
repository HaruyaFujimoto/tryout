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
    return redirect()->route('plan.list');
});
// Tryout Main
Route::get('/list', 'PlanController@show')->name('plan.list');
Route::get('/detail/{plan}', 'PlanController@detail')->name('plan.detail');
Route::get('/plan/post', 'PlanController@post')->name('plan.post');
Route::get('/about', 'Controller@about')->name('about');

// Twitter Login
Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider')->name('twitter.login');
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback')->name('twitter.callback');
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout')->name('twitter.logout');

// User
Route::get('/user', 'UserController@show')->name('user.show');
Route::delete('/user', 'UserController@delete')->name('user.delete');
