<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'create']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/{any?}', function () {
    return view('home');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');
