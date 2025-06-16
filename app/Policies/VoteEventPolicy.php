<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VoteEvent;
use Illuminate\Auth\Access\Response;

class VoteEventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_vote::event');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, VoteEvent $voteEvent): bool
    {
        return $user->can('view_vote::event');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_vote::event');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, VoteEvent $voteEvent): bool
    {
        return $user->can('update_vote::event');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, VoteEvent $voteEvent): bool
    {
        return $user->can('delete_vote::event');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, VoteEvent $voteEvent): bool
    {
        return $user->can('restore_vote::event');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, VoteEvent $voteEvent): bool
    {
        return $user->can('force_delete_vote::event');
    }

    /**
     * Determine whether the user can delete any model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_vote::event');
    }

    /**
     * Determine whether the user can permanently delete any model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_vote::event');
    }

    /**
     * Determine whether the user can restore any model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_vote::event');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_vote::event');
    }
}
