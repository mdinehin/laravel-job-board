<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class EmployerVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('employer_vacancies.index', [
            'vacancies' => $request->user()->employer
                ->vacancies()
                ->with([
                    'employer',
                    'applications',
                    'applications.user',
                ])
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer_vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000|max:1000000',
            'description' => 'required|string',
            'experience' => 'required|in:'.implode(',', Vacancy::$experience),
            'category' => 'required|in:'.implode(',', Vacancy::$category),
        ]);

        $request->user()
            ->employer
            ->vacancies()
            ->create($validatedData);

        return redirect()->route('my-vacancies.index')
            ->with('success', 'Vacancy created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * The $myVacancy parameter name mirrors the {my_vacancy} route parameter
     * from `my-vacancies/{my_vacancy}/edit` (`php artisan route:list`).
     */
    public function edit(Vacancy $myVacancy)
    {
        return view('employer_vacancies.edit', [
            'vacancy' => $myVacancy,
        ]);
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
