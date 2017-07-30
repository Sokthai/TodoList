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

Route::get('/', 'HomeController')->name('home');
Route::get('/index/{no}', 'TodoController@index');
Route::get('/login', ['as' => 'login', 'uses' => 'SessionController@index']);
Route::post('/login', 'SessionController@login');
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/create', 'TodoController@create');
Route::post('/store', 'TodoController@store');
Route::post('/description/{id}', 'DescriptionController@store');
Route::get('/confirm/{arrId}', 'TodoController@confirm');
Route::delete('destroy/{IDs}', 'TodoController@destroy');

Route::get('/reset/', 'SessionController@sendResetPassword');
Route::post('/reset', 'SessionController@resetPassword');
Route::get('/reset/verify', 'SessionController@resetVerify');
Route::get('/reset/{token}', 'SessionController@resetPasswordWithToken');
Route::post('/reset/changePassword', 'SessionController@resetChangePassword');

Route::get('/sortByType', 'SortController@sortByType');
Route::get('/sortByCurrMonth', 'SortController@sortByCurrentMonth');
Route::get('/sortByComp', 'SortController@sortByComplete');
Route::get('/sortByInComp', 'SortController@sortByInComplete');
Route::get('/sortByClosed', 'SortController@sortByClosed');
Route::get('/sortByOpen', 'SortController@sortByOpen');
Route::get('/sortByCompC', 'SortController@sortByCompleteClosed');
Route::get('/sortByInCompC', 'SortController@sortByInCompleteClosed');






Route::get('/{name}', 'TodoController@show');
