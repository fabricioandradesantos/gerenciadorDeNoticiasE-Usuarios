<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
}); */


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
});



//Rotas do CRUD de users	
Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/index', [UserController::class, 'index']);
	Route::get('/profile/{id}', ['as' => 'profile.show', 'uses' => 'App\Http\Controllers\ProfileController@show']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::delete('profile/{id}', ['as' => 'destroy', 'uses' => 'App\Http\Controllers\ProfileController@destroy']);
	
	//Route::post('/news', [NewsController::class, 'store']);
	//Route::get('/news/{id}', [NewsController::class, 'show']);
		//Route::delete('/news/{id}', [NewsController::class, 'destroy'])->middleware('auth');
	//Route::get('/news/edit/{id}', [NewsController::class, 'edit' ])->middleware('auth');
	//Route::put('/news/update/{id}', [NewsController::class, 'update'])->middleware('auth');
});



//rotas de noticias
Route::group(['middleware' => 'auth'], function () {
	//Route::get('/dashboard', [NewsController::class, 'index']);
	Route::get('/home', [NewsController::class, 'index'])->name('home')->middleware('auth');
	Route::get('/news/create', [NewsController::class, 'create']);
	Route::post('/news', [NewsController::class, 'store']);
	Route::get('/news/{id}', [NewsController::class, 'show']);
	Route::delete('/news/{id}', [NewsController::class, 'destroy'])->middleware('auth');
	Route::get('/news/edit/{id}', [NewsController::class, 'edit' ])->middleware('auth');
	Route::put('/news/update/{id}', [NewsController::class, 'update'])->middleware('auth');
});

