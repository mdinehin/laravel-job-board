<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\Response;

class VacancyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the employer can view any models.
     */
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Vacancy $vacancy): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacancy $vacancy): bool|Response
    {
        if ($vacancy->employer->user_id !== $user->id) {
            return false;
        }

        if ($vacancy->applications()->count() > 0) {
            return Response::deny('This vacancy cannot be edited because it already has applications.');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacancy $vacancy): bool
    {
        return $vacancy->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacancy $vacancy): bool
    {
        return $vacancy->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacancy $vacancy): bool
    {
        return $vacancy->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can apply for the vacancy.
     */
    public function apply(User $user, Vacancy $vacancy): bool
    {
        return ! $vacancy->hasUserApplied($user);
    }
}
