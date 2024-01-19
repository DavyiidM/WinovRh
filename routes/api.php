<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Outras rotas protegidas por sanctum...
    require __DIR__.'/recruiters.php';
});

Route::post('/login', ['uses'=>'App\Http\Controllers\Auth\AdminLoginController@login']);
Route::post('/subscribe', ['uses'=>'App\Http\Controllers\Api\Recruiters\CandidateController@store']);
Route::get('/pdf/view/{filename}', ['uses'=>'App\Http\Controllers\Api\Recruiters\CandidateController@viewResume']);
Route::get('/login', ['uses'=>'App\Http\Controllers\Auth\AdminLoginController@validateLogin']);



// Outras rotas de autenticação...
