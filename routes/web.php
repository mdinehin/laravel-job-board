<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('vacancies.index');
});

Route::resource('vacancies', VacancyController::class)
    ->only('index');
