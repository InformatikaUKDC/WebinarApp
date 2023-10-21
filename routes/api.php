<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
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

// ---------------------------- USERS
Route::post('/user', [UsersController::class, 'registration']);
Route::post('/login', [UsersController::class, 'login']);
Route::get('/login', function () {
    return response()->json('Akun belum terauntentikasi', 200);
})->name('login');

// --------------------- MIDDLEWARE --> Role General
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/logout', [UsersController::class, 'logout']);
    Route::get('/user/{id}', [UsersController::class, 'detailUser']);
});

// ---------------------------- MIDDLEWARE ROUTE --> Role Admin
Route::group(['middleware' => ['user', 'auth:sanctum']], function () {
    Route::post('/event', [EventsController::class, 'addNewEvent']);
    Route::delete('/event-delete/{id}', [EventsController::class, 'deleteEvent']);
    Route::put('/event-update/{id}', [EventsController::class, 'updateEvent']);
    Route::get('/users', [UsersController::class, 'viewUsers']);
    Route::delete('/user/{id}', [UsersController::class, 'deleteUser']);
});

Route::get('/events', [EventsController::class, 'viewEvents']);
Route::get('/event-detail/{id}', [EventsController::class, 'detailEvent']);
