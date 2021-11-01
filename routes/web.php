<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'App\Http\Controllers\TicketController@index')->name("index");
Route::get('/create', 'App\Http\Controllers\TicketController@create')->name("create");
Route::post('/create', 'App\Http\Controllers\TicketController@store')->name("store");
Route::post('/search', 'App\Http\Controllers\TicketController@serach')->name("search");

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
