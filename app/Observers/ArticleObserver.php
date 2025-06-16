<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\ActivityLoggerService;

class ArticleObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El artículo ';

    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        $message = self::MESSAGE . $article->title . ' fue creado';
        $this->activityLog->default('created', $message, $article);
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        if ($article->wasChanged('deleted_at') && is_null($article->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $article->title . ' fue actualizado';
        $this->activityLog->default('updated', $message, $article);
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        if ($article->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $article->title . ' fue eliminado';
        $this->activityLog->default('deleted', $message, $article);
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        $message = self::MESSAGE . $article->title . ' fue restaurado';
        $this->activityLog->default('restored', $message, $article);
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        $message = self::MESSAGE . $article->title . ' fue eliminado permanentemente';
        $this->activityLog->default('force_deleted', $message, $article);
    }
}
