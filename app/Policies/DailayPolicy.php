<?php

namespace App\Policies;

use App\Models\Dailay;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DailayPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dailay $dailay): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dailay $dailay): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dailay $dailay): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dailay $dailay): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dailay $dailay): bool
    {
        return auth()->check();
    }
}
