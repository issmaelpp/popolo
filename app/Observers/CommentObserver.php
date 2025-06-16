<?php

namespace App\Observers;

use App\Models\Comment;
use App\Services\ActivityLoggerService;

class CommentObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El comentario ';

    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $message = self::MESSAGE . $comment->id . ' fue creada';
        $this->activityLog->default('created', $message, $comment);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        if ($comment->wasChanged('deleted_at') && is_null($comment->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $comment->id . ' fue actualizada';
        $this->activityLog->default('updated', $message, $comment);
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        if ($comment->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $comment->id . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $comment);
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        $message = self::MESSAGE . $comment->id . ' fue restaurada';
        $this->activityLog->default('restored', $message, $comment);
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        $message = self::MESSAGE . $comment->id . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $comment);
    }
}
