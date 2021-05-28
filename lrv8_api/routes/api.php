<?php

use App\Http\Controllers\POtsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pots',[POtsController::class, 'index']);
Route::get('/pots/{id}',[POtsController::class, 'show']);
Route::post('/pots', [POtsController::class, 'store']);
Route::put('/pots/{id}',[POtsController::class, 'update']);
Route::delete('/pots/{id}', [POtsController::class, 'destroy']);