<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\API\WorkerController;


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

//Staff API
Route::get('/check-staff/{id}', [IdentityController::class, 'checkStaff'])->middleware("cors");
Route::get('/staffs',[IdentityController::class, 'allStaffs'])->middleware("cors");
Route::post('/staffs', [IdentityController::class, 'create'])->middleware("cors");
Route::put('/staffs/{id}', [IdentityController::class, 'updateStaff'])->middleware("cors");
Route::delete('/staffs/{id}', [IdentityController::class, 'deleteStaff'])->middleware("cors");

//Scan API
Route::get('/staff/scans',[ScanController::class, 'index'])->middleware("cors");
Route::post('/staff/scans', [ScanController::class, 'create'])->middleware("cors");

