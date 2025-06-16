<?php

namespace App\Observers;

use App\Models\Project;
use App\Services\ActivityLoggerService;

class ProjectObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El proyecto ';

    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $message = self::MESSAGE . $project->title . ' fue creada';
        $this->activityLog->default('created', $message, $project);
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        if ($project->wasChanged('deleted_at') && is_null($project->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $project->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $project);
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        if ($project->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $project->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $project);
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        $message = self::MESSAGE . $project->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $project);
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        $message = self::MESSAGE . $project->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $project);
    }
}
