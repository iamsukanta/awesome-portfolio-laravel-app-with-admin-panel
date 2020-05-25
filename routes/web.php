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

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*----------------------Site Routes-------------------*/
Route::get('/', 'SiteController@index');
Route::get('/aboutme', 'SiteController@aboutme');
Route::get('/portfolio', 'SiteController@portfolio');
Route::get('/contact', 'SiteController@contact');
Route::get('/postdetails/{id}', 'SiteController@postdetails');

/*----------------------Admin Routes-------------------*/
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/sitelogout', 'AdminController@logout');
Route::resource('resumes', 'ResumeController');
Route::resource('portfolios', 'PortfolioController');
Route::resource('aboutmes', 'AboutmeController');
Route::resource('blogposts', 'BlogpostController');
Route::post('/summernoteImgUpload','BlogpostController@summernoteImgUpload');
Route::post('/summernoteImgDelete','BlogpostController@summernoteImgDelete');
