<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use App\Http\Controllers\Api\V1\Admin\RatingsApiController;
use App\Http\Controllers\Api\V1\Admin\TransactionApiController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UsersApiController::class, 'login']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('ratings', 'RatingsApiController');

    Route::apiResource('services', 'ServiceApiController');

    Route::get('/me', [UsersApiController::class, 'me']);
    Route::post('/logout', [UsersApiController::class, 'logout']);

    Route::get('/user/ratings', [RatingsApiController::class, 'getUserRatings']);

    Route::get('/user/transactions', [TransactionApiController::class, 'getUserTransactions']);
    Route::post('/user/transactions', [TransactionApiController::class, 'store']);
});

Route::apiResource('/ratings', 'RatingsApiController');

Route::get('/tickets', [TicketController::class, 'index']);
