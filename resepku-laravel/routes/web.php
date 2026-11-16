<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ResepController;

Route::resource('resep', ResepController::class);

use App\Http\Controllers\ApiResepController;

Route::prefix('api')->group(function () {
    Route::get('/resep', [ApiResepController::class, 'index']);
    Route::post('/resep', [ApiResepController::class, 'store']);
    Route::get('/resep/{id}', [ApiResepController::class, 'show']);
    Route::put('/resep/{id}', [ApiResepController::class, 'update']);
    Route::delete('/resep/{id}', [ApiResepController::class, 'destroy']);
});