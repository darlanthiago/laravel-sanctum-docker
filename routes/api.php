<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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


Route::prefix('/user')->group(function () {

    Route::post('/', [UserController::class, 'store']);

    Route::middleware('auth:sanctum')->get('/', function (Request $request) {
        return $request->user();
    });
});

Route::prefix('/session')->group(function () {

    Route::post('/', [SessionController::class, 'store']);
});

Route::prefix('/task')->group(function () {

    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::post('/', [TaskController::class, 'store']);
        Route::get('/', [TaskController::class, 'index']);
        Route::put('/{id}', [TaskController::class, 'update']);
    });
});


Route::get('/teste', function () {

    return response()->json([
        'message' => "Service 1 (Laravel) - teste",
    ]);
});


Route::get('/teste/2', function () {

    return response()->json([
        'message' => "Service 1 (Laravel) - teste 2",
    ]);
});
