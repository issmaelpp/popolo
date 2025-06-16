<?php

namespace App\Observers;

use App\Models\User;
use App\Services\ActivityLoggerService;

class UserObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El usuario ';

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $message = self::MESSAGE . $user->name . ' fue creada';
        $this->activityLog->default('created', $message, $user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->wasChanged('deleted_at') && is_null($user->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $user->name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $user);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        if ($user->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $user->name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $user);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $message = self::MESSAGE . $user->name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $user);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $message = self::MESSAGE . $user->name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $user);
    }
}
