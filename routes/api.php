<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('user')->group(function () {
    Route::get('/', [ApiUserController::class, 'index']);
    Route::get('/{id}', [ApiUserController::class, 'show']);
    Route::post('/', [ApiUserController::class, 'store']);
    Route::put('/{id}', [ApiUserController::class, 'update']);
    Route::delete('/{id}', [ApiUserController::class, 'destroy']);
});