<?php

namespace App\Policies;

use App\Models\TrafficLine;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TrafficLinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_traffic::line');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TrafficLine $trafficLine): bool
    {
        return $user->can('view_traffic::line');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_traffic::line');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TrafficLine $trafficLine): bool
    {
        return $user->can('update_traffic::line');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TrafficLine $trafficLine): bool
    {
        return $user->can('delete_traffic::line');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TrafficLine $trafficLine): bool
    {
        return $user->can('restore_traffic::line');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TrafficLine $trafficLine): bool
    {
        return $user->can('force_delete_traffic::line');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_traffic::line');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_traffic::line');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_traffic::line');
    }

    /**
     * Determine whether the user can reorder models.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_traffic::line');
    }
}
