<?php

namespace App\Observers;

use App\Models\ArticleTag;
use App\Services\ActivityLoggerService;

class ArticleTagObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación artículo-tag ';

    /**
     * Handle the ArticleTag "created" event.
     */
    public function created(ArticleTag $articleTag): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $articleTag);
    }

    /**
     * Handle the ArticleTag "updated" event.
     */
    public function updated(ArticleTag $articleTag): void
    {
        if ($articleTag->wasChanged('deleted_at') && is_null($articleTag->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $articleTag);
    }

    /**
     * Handle the ArticleTag "deleted" event.
     */
    public function deleted(ArticleTag $articleTag): void
    {
        if ($articleTag->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $articleTag);
    }

    /**
     * Handle the ArticleTag "restored" event.
     */
    public function restored(ArticleTag $articleTag): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $articleTag);
    }

    /**
     * Handle the ArticleTag "force deleted" event.
     */
    public function forceDeleted(ArticleTag $articleTag): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $articleTag);
    }
}
