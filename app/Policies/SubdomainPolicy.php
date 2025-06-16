<?php

namespace App\Policies;

use App\Models\Subdomain;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubdomainPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_subdomain');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Subdomain $subdomain): bool
    {
        return $user->can('view_subdomain');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_subdomain');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subdomain $subdomain): bool
    {
        return $user->can('update_subdomain');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Subdomain $subdomain): bool
    {
        return $user->can('delete_subdomain');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Subdomain $subdomain): bool
    {
        return $user->can('restore_subdomain');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Subdomain $subdomain): bool
    {
        return $user->can('force_delete_subdomain');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_subdomain');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_subdomain');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_subdomain');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_subdomain');
    }
}
