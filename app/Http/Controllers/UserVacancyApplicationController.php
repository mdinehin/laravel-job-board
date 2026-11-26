<?php

namespace App\Http\Controllers;

use App\Models\VacancyApplication;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserVacancyApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('user_vacancy_applications.index', [
            'applications' => $request->user()
                ->applications()
                ->with([
                    'vacancy' => fn ($query) => $query->withCount('applications')
                        ->withAvg('applications', 'expected_salary')
                        ->withTrashed(),
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
     */
    public function destroy(VacancyApplication $myApplication): RedirectResponse
    {
        $myApplication->delete();

        return redirect()->back()
            ->with('success', 'Vacancy application withdrawn successfully');
    }
}
