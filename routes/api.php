<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\FutsalController;
use App\Models\Futsal;

use App\Http\Controllers\API\FutsalController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BaseController;
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

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('futsal', FutsalController::class);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('futsal', [FutsalController::class, 'index']);
// Route::post('futsal', [FutsalController::class, 'create']);
// Route::put('futsal/{id}', [FutsalController::class, 'update']);
// Route::delete('futsal/{id}', [FutsalController::class, 'delete']);
