<?php

use App\Http\Controllers\JobController;
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


require __DIR__.'/auth.php';

Route::group(['prefix' => 'jobs'], function (){
    Route::get('', [JobController::class, 'index']);
    Route::post('', [JobController::class, 'store'])->middleware('auth:sanctum');
});