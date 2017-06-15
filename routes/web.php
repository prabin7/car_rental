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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('sites.index');
// });


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/profile', 'AdminController@profile');
Route::get('/admin/editProfile', 'AdminController@editProfile');
Route::post('/admin/updateProfile', 'AdminController@updateProfile');
Route::get('/admin/changePassword', 'AdminController@changePassword');
Route::post('/admin/updatePassword', 'AdminController@updatePassword');


/*
|--------------------------------------------------------------------------
| Sites Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'SiteController@index');
Route::get('/result', 'SiteController@result');
Route::get('/booking', 'SiteController@booking');

// Route::get('/', 'SiteController@');