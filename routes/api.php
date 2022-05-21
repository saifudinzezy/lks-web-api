<?php

use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\RegionalController;
use App\Http\Controllers\Api\SocietyController;
use App\Http\Controllers\Api\SpotController;
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
Route::post('societies/login', [SocietyController::class, 'login']);
Route::post('societies/logout', [SocietyController::class, 'logout']);
Route::resource('societies', SocietyController::class);
Route::resource('regionals', RegionalController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('consultations', ConsultationController::class);
Route::resource('spots', SpotController::class);
