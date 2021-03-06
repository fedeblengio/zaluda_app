<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use Carbon\Carbon;
use App\Models\idol;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/idols','App\Http\Controllers\idolController@index');
Route::get('/idols/{id}','App\Http\Controllers\idolController@show');
Route::post('/idols','App\Http\Controllers\idolController@store');
Route::put('/idols/{id}','App\Http\Controllers\idolController@update');
Route::delete('/idols/{id}','App\Http\Controllers\idolController@destroy');


Route::post('/users','App\Http\Controllers\user_google@store');

Route::post('/requests','App\Http\Controllers\logicController@requestsStore');

Route::post('/response','App\Http\Controllers\logicController@responseStore');
Route::get('/response/{id}','App\Http\Controllers\logicController@showResponseFinal');

Route::post('/sale','App\Http\Controllers\logicController@saleStore');