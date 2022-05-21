<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\SocietyVaccinationController;
use App\Http\Controllers\Api\SpotController;
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
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('consultations', [ConsultationController::class, 'store']);
Route::get('consultations', [ConsultationController::class, 'show']);
Route::get('spots', [SpotController::class, 'show']);
Route::get('spots/{spot_id}', [SpotController::class, 'showSpot']);
