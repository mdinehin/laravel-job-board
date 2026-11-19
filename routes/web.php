<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserVacancyApplicationController;
use App\Http\Controllers\VacancyApplicationController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('vacancies.index');
});

Route::resource('vacancies', VacancyController::class)
    ->only([
        'index',
        'show',
    ]);

// Alias the default 'login' route expected by middleware to a custom auth path
Route::get('login', function () {
    return to_route('auth.create');
})->name('login');

Route::resource('auth', AuthController::class)
    ->only([
        'create',
        'store',
    ]);

Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('vacancies.application', VacancyApplicationController::class)
        ->only([
            'create',
            'store',
        ]);

    Route::resource('my-applications', UserVacancyApplicationController::class)
        ->only([
            'index',
            'destroy',
        ]);
});
