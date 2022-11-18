<?php

use App\Http\Controllers\API\BookableReviewController;
use App\Http\Controllers\API\BookablesController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\BookableAvailabilityController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bookables', [BookablesController::class, 'index']);
Route::get('bookables/{bookable}', [BookablesController::class, 'show']);
Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class,);
Route::get('bookables/{bookable}/reviews', BookableReviewController::class);
Route::apiResource('reviews', ReviewController::class)->only(['show', 'store']);
Route::get('bookings/review/{review}', [BookingController::class, 'show']);
