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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// ---------------------------- USERS
Route::post('/user', [UsersController::class, 'registration']);
Route::post('/login', [UsersController::class, 'login']);
Route::get('/login', function(){
    return response()->json('Akun belum terauntentikasi', 200);
})->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->middleware(['auth:sanctum']);

// ---------------------------- EVENT ROUTE
Route::group(['middleware' => ['user','auth:sanctum']], function () {
    Route::post('/event', [EventsController::class, 'addNewEvent']);
    Route::delete('/event/{id}', [EventsController::class, 'deleteEvent']);
    Route::put('/event/{id}', [EventsController::class, 'updateEvent']);
    Route::get('/users', [UsersController::class, 'viewUsers']);
});

Route::get('/events', [EventsController::class, 'viewEvents']);
