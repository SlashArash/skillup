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

Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/session/{session}', 'UserController@present')->name('users.session');

Route::resource('skills', 'SkillController');
Route::get('skills/{skill}/users', 'SkillController@getUsers')->name('skills.get_users');

Route::resource('sessions', 'SessionController');
Route::get('sessions/{session}/users', 'SessionController@getUsers')->name('sessions.get_users');
