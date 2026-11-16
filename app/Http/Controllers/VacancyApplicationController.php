<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Vacancy $vacancy)
    {
        return view('vacancy_applications.create', [
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vacancy $vacancy)
    {
        $vacancy->applications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000',
            ]),
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
