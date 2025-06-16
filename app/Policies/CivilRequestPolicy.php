<?php

namespace App\Policies;

use App\Models\CivilRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CivilRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_civil::request');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CivilRequest $civilRequest): bool
    {
        return $user->can('view_civil::request');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_civil::request');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CivilRequest $civilRequest): bool
    {
        return $user->can('update_civil::request');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CivilRequest $civilRequest): bool
    {
        return $user->can('delete_civil::request');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CivilRequest $civilRequest): bool
    {
        return $user->can('restore_civil::request');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CivilRequest $civilRequest): bool
    {
        return $user->can('force_delete_civil::request');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_civil::request');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_civil::request');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_civil::request');
    }

    /**
     * Determine whether the user can reorder models.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_civil::request');
    }
}
