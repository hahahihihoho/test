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

Route::get('/home', ['middleware' => 'auth', 'uses' => 'HomeController@index'])->name('home');
Route::get('/profile/{slug}', 'HomeController@profileUser')->name('profile-user');
Route::get('/setting/{slug}', 'UserController@settingUser')->name('setting-user');
Route::post('/user/update/{slug}', 'userController@updateUser');

Route::post('create-trip', 'tripController@createTrip');

Route::get('create/trip',  ['middleware' => 'auth', 'uses' => 'tripController@pageCreate']);

Route::get('trip/{slug}', 'tripController@detailTrip')->name('detail-trip');
Route::get('trip/{slug}/buy', ['middleware' => 'auth', 'uses' => 'tripController@buyTrip'])->name('buy-trip');
Route::get('trip/{slug}/finish-order', 'tripController@finishOrder')->name('finish-order');


//ROUTE AGENT
Route::get('/operator/{slug}', 'HomeController@profileAgent')->name('profile-agent');
Route::get('/operator/setting/{slug}', 'AgentController@settingAgent')->name('setting-agent');
Route::get('/operator/follow/{slug}', 'AgentController@followAgent')->name('follow-agent');
Route::get('/operator/unfollow/{slug}', 'AgentController@unfollowAgent')->name('unfollow-agent');
Route::post('/operator/update/{slug}', 'AgentController@updateAgent');
Route::post('/bank/update/{slug}', 'AgentController@updateBank');

//ROUTE ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
	Route::get('/index', 'AdminController@index');
});
