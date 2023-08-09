<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/{user}/tasks', [TaskController::class, 'index']);
    Route::get('/{user}/tasks/{task}', [TaskController::class, 'show']);
    Route::post('/{user}/tasks', [TaskController::class, 'store']);
    Route::put('/{user}/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/{user}/tasks/{task}', [TaskController::class, 'destroy']);
});
