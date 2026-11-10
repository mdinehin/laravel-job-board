<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::resource('vacancies', VacancyController::class)
    ->only('index');
