<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// Knuckles\Scribe
Route::get('/docs', [\Knuckles\Scribe\Http\Controller::class, 'webpage']);
Route::get('/docs/postman', [\Knuckles\Scribe\Http\Controller::class, 'postman'])
    ->name('scribe.postman');
Route::get('/docs/openapi', [\Knuckles\Scribe\Http\Controller::class, 'openapi'])
    ->name('scribe.openapi');