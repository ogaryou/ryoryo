<?php
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return view('auth.register');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/top', 'Auth\LoginController@index');

Route::get('/', 'Auth\RegisterController@register');
Route::post('/', 'Auth\RegisterController@register');
// Route::post('/', 'Auth\RegisterController@validator');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/logout','Auth\LoginController@logout');
Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search')->name('search');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');



