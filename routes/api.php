<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

// Route::resource('item', ItemsController::class);

Route::get('item', [ItemsController::class, 'index']);
Route::post('item', [ItemsController::class, 'store']);
Route::post('item/{id}', [ItemsController::class, 'update']);
Route::delete('item/{id}', [ItemsController::class, 'destroy']);
