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
Route::post('/top','PostsController@create');

Route::get('/logout','Auth\LoginController@logout');
Route::get('/profile/{id}/update-form','UsersController@profile');
Route::post('/profile/{id}/update-form','UsersController@update');

Route::get('/search','UsersController@search')->name('search');

Route::get('/follow-list','PostsController@followlist');
Route::get('/follow-list/{id}/profile','PostsController@follows');
Route::get('/follower-list','PostsController@followerlist');
Route::get('/follower-list/{id}/profile','PostsController@followers');

Route::post('users/follow', 'UsersController@followings')->name('followings');
Route::delete('users/unfollow', 'UsersController@unfollowers')->name('unfollowers');


Route::group(['prefix' => 'users/{id}'], function () {
  Route::post('follow', 'FollowUserController@store')->name('follow');
  Route::delete('unfollow', 'FollowUserController@destroy')->name('unfollow');
});