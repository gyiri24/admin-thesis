<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Ratings
    Route::apiResource('ratings', 'RatingsApiController');

    // Service
    Route::apiResource('services', 'ServiceApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');
});

Route::post('/auth/login',[AuthController::class,'login']);
