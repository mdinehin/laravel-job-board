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
                ->filter($filters)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
