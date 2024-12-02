<?php

use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\HrisController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('/importposition', [PositionController::class, 'importPosition'])->name('importPosition');

// Route::post('/hris-adduser', [HrisController::class, 'addUser'])->name('addUser');

    Route::group(['middleware' => ['auth', 'hakakses:admin,user']], function(){

    });


