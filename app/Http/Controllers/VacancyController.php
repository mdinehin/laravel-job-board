<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Vacancy::class);

        $filters = request()->only([
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category',
        ]);

        return view('vacancies.index', [
            'vacancies' => Vacancy::with('employer')
                ->latest()
                ->filter($filters)
                ->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        Gate::authorize('view', $vacancy);

        return view('vacancies.show', [
            'vacancy' => $vacancy->load('employer.vacancies')
        ]);
    }
}
