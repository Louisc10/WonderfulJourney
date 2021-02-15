<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'RoutingController@index');
Route::get('/about-us', 'RoutingController@about_us');
Route::get('/category/{text}', 'RoutingController@category');
Route::get('/view/{id}', 'ArticleController@view');

Route::get('/login', 'RoutingController@Login')->name('login');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');

Route::get('/manage-user', 'RoutingController@manage_user')->middleware('auth')->middleware('admin');
Route::post('/manage-user/delete/{id}', 'LoginController@delete_user')->middleware('auth')->middleware('admin');

Route::get('/signup', 'RoutingController@signup')->middleware('guest');
Route::post('/signup', 'LoginController@create_user')->middleware('guest');

Route::get('/profile', 'RoutingController@profile')->middleware('auth')->middleware('user');
Route::post('/profile', 'LoginController@update_profile')->middleware('auth')->middleware('user');

Route::get('/blog', 'ArticleController@view_by_user')->middleware('auth')->middleware('user');
Route::get('/blog/create', 'RoutingController@create_blog')->middleware('auth')->middleware('user');
Route::post('/blog/create', 'ArticleController@create_blog')->middleware('auth')->middleware('user');
Route::post('/blog/delete/{id}', 'ArticleController@delete_article')->middleware('auth')->middleware('user');
