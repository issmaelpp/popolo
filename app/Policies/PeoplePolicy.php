<?php

namespace App\Policies;

use App\Models\People;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PeoplePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_people');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, People $people): bool
    {
        return $user->can('view_people');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_people');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, People $people): bool
    {
        return $user->can('update_people');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, People $people): bool
    {
        return $user->can('delete_people');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, People $people): bool
    {
        return $user->can('restore_people');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, People $people): bool
    {
        return $user->can('force_delete_people');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_people');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_people');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_people');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_people');
    }
}
