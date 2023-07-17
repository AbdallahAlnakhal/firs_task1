<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiPostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/api', [ApiPostController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [ApiPostController::class, 'index']);
Route::post('/storeusers', [ApiPostController::class, 'store']);
Route::get('/showusers/{id}', [ApiPostController::class, 'show']);
Route::put('/updatusers/{id}', [ApiPostController::class, 'update']);
Route::delete('/deleteusers/{id}', [ApiPostController::class, 'destroy']);



