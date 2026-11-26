<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAnyEmployer', Vacancy::class);

        return view('employer_vacancies.index', [
            'vacancies' => $request->user()->employer
                ->vacancies()
                ->with([
                    'employer',
                    'applications',
                    'applications.user',
                ])
                ->withTrashed()
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Vacancy::class);

        return view('employer_vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyRequest $request)
    {
        Gate::authorize('create', Vacancy::class);

        $request->user()->employer
            ->vacancies()
            ->create(
                $request->validated()
            );

        return redirect()->route('my-vacancies.index')
            ->with('success', 'Vacancy created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * The $myVacancy parameter name mirrors the {my_vacancy} route parameter
     * from `my-vacancies/{my_vacancy}/edit` (`php artisan route:list`).
     */
    public function edit(Vacancy $myVacancy)
    {
        Gate::authorize('update', $myVacancy);

        return view('employer_vacancies.edit', [
            'vacancy' => $myVacancy,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacancyRequest $request, Vacancy $myVacancy)
    {
        Gate::authorize('update', $myVacancy);

        $myVacancy->update(
            $request->validated()
        );

        return redirect()->route('my-vacancies.index')
            ->with('success', 'Vacancy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $myVacancy)
    {
        Gate::authorize('delete', $myVacancy);

        $myVacancy->delete();

        return redirect()->route('my-vacancies.index')
            ->with('success', 'Vacancy deleted successfully');
    }
}
