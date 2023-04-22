<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use App\Http\Controllers\Api\V1\Admin\RatingsApiController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Ratings
    Route::apiResource('ratings', 'RatingsApiController');

    // Service
    Route::apiResource('services', 'ServiceApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');

    Route::get('/me', [UsersApiController::class, 'me']);

    Route::get('/user/ratings', [RatingsApiController::class, 'getUserRatings']);

});

Route::post('/login', [UsersApiController::class, 'login']);
