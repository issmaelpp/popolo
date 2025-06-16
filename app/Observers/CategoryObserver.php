<?php

namespace App\Observers;

use App\Models\Category;
use App\Services\ActivityLoggerService;

class CategoryObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La categoría ';

    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        $message = self::MESSAGE . $category->name . ' fue creada';
        $this->activityLog->default('created', $message, $category);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        if ($category->wasChanged('deleted_at') && is_null($category->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $category->name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $category);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        if ($category->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $category->name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $category);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        $message = self::MESSAGE . $category->name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $category);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        $message = self::MESSAGE . $category->name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $category);
    }
}
