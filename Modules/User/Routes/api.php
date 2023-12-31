<?php

use Dingo\Api\Routing\Router;
use Modules\User\Http\Controllers\Api\CategoryController;
use Modules\User\Http\Controllers\Api\DomainController;
use Modules\User\Http\Controllers\Api\LevelController;
use Modules\User\Http\Controllers\Api\SchoolController;
use Modules\User\Http\Controllers\Api\SpecialityController;
use Modules\User\Http\Controllers\Api\UserController;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => 'auth:sanctum'], function (Router $api) {
    $api->get('/user/me', [UserController::class, 'me']);
    $api->post('/user/profile/{id}', [UserController::class, 'update']);
    $api->put('/user/password', [UserController::class, 'updatePassword']);
    $api->put('/users/password', [UserController::class, 'updatePasswords']);
    $api->put('/user/fcm-token', [UserController::class, 'updateToken']);
    $api->delete('/user/delete/{id}', [UserController::class, 'destroy']);

    $api->group(['prefix' => 'levels'], function (Router $api) {
        $api->get('/{id}', [LevelController::class, 'show']);
        $api->get('/', [LevelController::class, 'index']);
    });

    $api->group(['prefix' => 'categories'], function (Router $api) {
        $api->get('/{id}', [CategoryController::class, 'show']);
        $api->get('/', [CategoryController::class, 'index']);
    });

    $api->group(['prefix' => 'specialities'], function (Router $api) {
        $api->get('/{id}', [SpecialityController::class, 'show']);
        $api->get('/', [SpecialityController::class, 'index']);
    });

    $api->group(['prefix' => 'domains'], function (Router $api) {
        $api->get('/', [DomainController::class, 'index']);
        $api->get('/{id}', [DomainController::class, 'show']);
    });

    $api->group(['prefix' => 'schools'], function (Router $api) {
        $api->get('/', [SchoolController::class, 'index']);
        $api->get('/{id}', [SchoolController::class, 'show']);
    });
});
