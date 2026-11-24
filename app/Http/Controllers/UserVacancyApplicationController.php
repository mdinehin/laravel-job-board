<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserVacancyApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        return view('user_vacancy_applications.index', [
            'applications' => $user->applications()
                ->with([
                    'vacancy' => fn ($query) => $query->withCount('applications')
                        ->withAvg('applications', 'expected_salary'),
                    'vacancy.employer',
                ])
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
