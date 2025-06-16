<?php

namespace App\Observers;

use App\Models\Group;
use App\Services\ActivityLoggerService;

class GroupObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El grupo ';

    /**
     * Handle the Group "created" event.
     */
    public function created(Group $group): void
    {
        $message = self::MESSAGE . $group->label . ' fue creada';
        $this->activityLog->default('created', $message, $group);
    }

    /**
     * Handle the Group "updated" event.
     */
    public function updated(Group $group): void
    {
        if ($group->wasChanged('deleted_at') && is_null($group->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $group->label . ' fue actualizada';
        $this->activityLog->default('updated', $message, $group);
    }

    /**
     * Handle the Group "deleted" event.
     */
    public function deleted(Group $group): void
    {
        if ($group->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $group->label . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $group);
    }

    /**
     * Handle the Group "restored" event.
     */
    public function restored(Group $group): void
    {
        $message = self::MESSAGE . $group->label . ' fue restaurada';
        $this->activityLog->default('restored', $message, $group);
    }

    /**
     * Handle the Group "force deleted" event.
     */
    public function forceDeleted(Group $group): void
    {
        $message = self::MESSAGE . $group->label . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $group);
    }
}
