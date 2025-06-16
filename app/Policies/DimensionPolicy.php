<?php

namespace App\Policies;

use App\Models\Dimension;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DimensionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_dimension');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dimension $dimension): bool
    {
        return $user->can('view_dimension');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_dimension');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dimension $dimension): bool
    {
        return $user->can('update_dimension');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dimension $dimension): bool
    {
        return $user->can('delete_dimension');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dimension $dimension): bool
    {
        return $user->can('restore_dimension');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dimension $dimension): bool
    {
        return $user->can('force_delete_dimension');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_dimension');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_dimension');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_dimension');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_dimension');
    }
}
