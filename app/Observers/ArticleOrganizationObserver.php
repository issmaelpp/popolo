<?php

namespace App\Observers;

use App\Models\ArticleOrganization;
use App\Services\ActivityLoggerService;

class ArticleOrganizationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación artículo-organización ';

    /**
     * Handle the ArticleOrganization "created" event.
     */
    public function created(ArticleOrganization $articleOrganization): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $articleOrganization);
    }

    /**
     * Handle the ArticleOrganization "updated" event.
     */
    public function updated(ArticleOrganization $articleOrganization): void
    {
        if ($articleOrganization->wasChanged('deleted_at') && is_null($articleOrganization->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $articleOrganization);
    }

    /**
     * Handle the ArticleOrganization "deleted" event.
     */
    public function deleted(ArticleOrganization $articleOrganization): void
    {
        if ($articleOrganization->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $articleOrganization);
    }

    /**
     * Handle the ArticleOrganization "restored" event.
     */
    public function restored(ArticleOrganization $articleOrganization): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $articleOrganization);
    }

    /**
     * Handle the ArticleOrganization "force deleted" event.
     */
    public function forceDeleted(ArticleOrganization $articleOrganization): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $articleOrganization);
    }
}
