<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'loginView'])->name('login');
Route::get('register', [UserController::class, 'registerView'])->name('register');

Route::post('login', [UserController::class, 'loginMethod']);
Route::post('register', [UserController::class, 'registerMethod']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('articles')->group(function(){
        Route::get('show', [DashboardController::class, 'showArticle'])->name('articles.show');
        Route::get('create', [DashboardController::class, 'createArticle'])->name('articles.create');
    });

    Route::prefix('categories')->group(function(){
        Route::get('show', [DashboardController::class, 'showCategory'])->name('categories.show');
        Route::get('create', [DashboardController::class, 'createCategory'])->name('categories.create');
    });
});