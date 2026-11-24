<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VacancyApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Vacancy $vacancy)
    {
        Gate::authorize('apply', $vacancy);

        return view('vacancy_applications.create', [
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vacancy $vacancy)
    {
        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private_disk');

        $vacancy->applications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
        ]);

        return redirect()->route('vacancies.show', $vacancy)
            ->with('success', 'Vacancy application submitted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
