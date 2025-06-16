<?php

namespace App\Policies;

use App\Models\OrganizationResolution;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrganizationResolutionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_address');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OrganizationResolution $organizationResolution): bool
    {
        return $user->can('view_address');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_address');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OrganizationResolution $organizationResolution): bool
    {
        return $user->can('update_address');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OrganizationResolution $organizationResolution): bool
    {
        return $user->can('delete_address');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OrganizationResolution $organizationResolution): bool
    {
        return $user->can('restore_address');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OrganizationResolution $organizationResolution): bool
    {
        return $user->can('force_delete_address');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_address');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_address');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_address');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_address');
    }
}
