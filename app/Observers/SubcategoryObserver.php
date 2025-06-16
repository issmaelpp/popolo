<?php

namespace App\Observers;

use App\Models\Subcategory;
use App\Services\ActivityLoggerService;

class SubcategoryObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La subcategoría ';

    /**
     * Handle the Subcategory "created" event.
     */
    public function created(Subcategory $subcategory): void
    {
        $message = self::MESSAGE . $subcategory->name . ' fue creada';
        $this->activityLog->default('created', $message, $subcategory);
    }

    /**
     * Handle the Subcategory "updated" event.
     */
    public function updated(Subcategory $subcategory): void
    {
        if ($subcategory->wasChanged('deleted_at') && is_null($subcategory->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $subcategory->name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $subcategory);
    }

    /**
     * Handle the Subcategory "deleted" event.
     */
    public function deleted(Subcategory $subcategory): void
    {
        if ($subcategory->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $subcategory->name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $subcategory);
    }

    /**
     * Handle the Subcategory "restored" event.
     */
    public function restored(Subcategory $subcategory): void
    {
        $message = self::MESSAGE . $subcategory->name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $subcategory);
    }

    /**
     * Handle the Subcategory "force deleted" event.
     */
    public function forceDeleted(Subcategory $subcategory): void
    {
        $message = self::MESSAGE . $subcategory->name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $subcategory);
    }
}
