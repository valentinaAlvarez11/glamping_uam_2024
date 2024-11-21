<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');



Route::apiResource('reservations', 
        App\Http\Controllers\ReservationController::class);

        
Route::get('/hola/locos',
    [App\Http\Controllers\CabinController::class,
        'index'])->name('hola.locos');
Route::post('/v1/login',
    [App\Http\Controllers\api\v1\AuthController::class,
        'login'])->name('api.login');
        Route::apiResource('users', 
        App\Http\Controllers\UserController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/v1/logout',
        [App\Http\Controllers\api\v1\AuthController::class,
            'logout'])->name('api.logout');
            


Route::apiresource('cabin_levels', 
        App\Http\Controllers\CabinLevelController::class);

Route::apiResource('cabins',
        App\Http\Controllers\CabinController::class);

Route::apiResource('services', 
        App\Http\Controllers\ServiceController::class);

Route::apiResource('cabinservices', 
        App\Http\Controllers\CabinServiceController::class);


});
