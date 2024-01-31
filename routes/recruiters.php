<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('recruiters')->as('recruiters.')->group(function () {
    // Auth

    // Categorias
    Route::apiResource('categories', \App\Http\Controllers\Api\Recruiters\CategoryController::class);

    // Candidatos
    Route::apiResource('candidates', \App\Http\Controllers\Api\Recruiters\CandidateController::class)
        ->only([
            'index',
            'show',

        ]);

    // Vagas
    Route::apiResource('vacancies', \App\Http\Controllers\Api\Recruiters\VacancyController::class)->only([
        'store',
        'index',
        'show',
    ]);




    Route::apiResource('vacancies/{vacancy}/categories', \App\Http\Controllers\Api\Recruiters\VacancyCategoryController::class)
        ->only([
            'store',
            'destroy',
        ]);
});
