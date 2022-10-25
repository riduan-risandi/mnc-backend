<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\API\ResidenceController;

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

 
Route::get('/residences', 'App\Http\Controllers\API\ResidenceController@all');
Route::get('/residences/{id}', 'App\Http\Controllers\API\ResidenceController@one'); 
Route::post('/residences/store', 'App\Http\Controllers\API\ResidenceController@store'); 
Route::put('/residences/update/{id}', 'App\Http\Controllers\API\ResidenceController@update'); 
Route::delete('/residences/delete/{residences}', 'App\Http\Controllers\API\ResidenceController@destroy'); 

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
