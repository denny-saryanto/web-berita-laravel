<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\UserController;

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

Route::prefix('v1')->group(function(){
    Route::post('register', [UserController::class, 'register'])->name('api.register');
    Route::post('login', [UserController::class, 'login'])->name('api.login');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('profile', [UserController::class, 'profile'])->name('api.profile');
        Route::get('logout', [UserController::class, 'logout'])->name('api.logout');
    });
});
