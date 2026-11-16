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
    public function store(Request $request)
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
