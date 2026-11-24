<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VacancyApplication;
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
     * 
     * Uses implicit route-model binding, so the parameter name ($myApplication)
     * must match the camelCase equivalent of the {my_application} route segment
     * on DELETE my-applications/{my_application}.
     *
     * @param  VacancyApplication  $myApplication
     */
    public function destroy(VacancyApplication $myApplication)
    {
        $myApplication->delete();

        return redirect()->back()
            ->with('success', 'Vacancy application withdrawn successfully');
    }
}
