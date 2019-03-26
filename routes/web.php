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
    return redirect()->route('plan.index');
});
// Plan (: Tryout Main)
Route::get('plan', 'PlanController@index')->name('plan.index');
Route::get('plan/post','PlanController@create')->name('plan.create');
Route::post('plan', 'PlanController@store')->name('plan.store');

Route::get('plan/{plan}', 'PlanController@show')->name('plan.show');
Route::get('plan/{plan}/edit', 'PlanController@edit')->name('plan.edit');
Route::put('Plan/{plan}', 'PlanController@update')->name('plan.update');

Route::delete('plan/{plan}', 'PlanController@destroy')->name('plan.destroy');
Route::post('plan/{plan}/sendlike', 'PlanController@like')->name('plan.like');


Route::get('/about', 'Controller@about')->name('about');

// Twitter Login
Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider')->name('twitter.login');
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback')->name('twitter.callback');
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout')->name('twitter.logout');

// User
Route::get('/user', 'UserController@show')->name('user.show');
Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
Route::get('/user/invite', 'UserController@invite')->name('user.invite');

// Skill
Route::get('/skill', 'SkillController@index')->name('skill.index');
Route::get('/skill/post', 'SkillController@create')->name('skill.create');
Route::post('/skill', 'SkillController@store')->name('skill.store');
Route::delete('/skill/{skill}', 'SkillController@destroy')->name('skill.destroy');