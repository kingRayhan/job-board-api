<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UploadController;
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
    Route::get('{job:slug}', [JobController::class, 'show']);
    Route::put('{job:slug}', [JobController::class, 'update'])->middleware('auth:sanctum');;
    Route::post('', [JobController::class, 'store'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'uploads'], function (){
   Route::post('', [UploadController::class, 'upload'])->middleware('auth:sanctum');
   Route::delete('', [UploadController::class, 'destroy'])->middleware('auth:sanctum');
});


Route::group(['prefix' => 'tags'], function (){
    Route::get('', [TagController::class, 'index']);
    Route::post('', [TagController::class, 'store'])->middleware('auth:sanctum');
});
