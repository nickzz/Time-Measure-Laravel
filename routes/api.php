<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdentityController;

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
Route::get('/check-staff/{id}', [IdentityController::class, 'checkStaff']);
Route::get('/staffs',[IdentityController::class, 'allStaffs']);
Route::post('/staff', [IdentityController::class, 'create']);
Route::put('/staffs/{id}', [IdentityController::class, 'updateStaff']);
Route::delete('/staffs/{id}', [IdentityController::class, 'deleteStaff']);


