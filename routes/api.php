<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\TokensController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   
    return $request->user();
});



/**
 * /anaytics
 * 
 */
Route::apiResource('analytics', AnalyticsController::class)->middleware('custom:middleware')->only([
     'store', 'update', 'destroy','show'
]); 
/**
 * /tokens
 * 
 */
Route::apiResource('tokens', TokensController::class)->middleware('custom:middleware')->only([
    'index', //'show'
]); 