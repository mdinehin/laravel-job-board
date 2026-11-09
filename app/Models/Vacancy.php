<?php

namespace App\Models;

use Database\Factories\VacancyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /** @use HasFactory<VacancyFactory> */
    use HasFactory;

    public static array $experience = [
        'entry',
        'intermediate',
        'senior',
    ];

    public static array $category = [
        'entry',
        'intermediate',
        'senior',
    ];
}
