<?php

namespace App\Models;

use App\Observers\OrganizationResolutionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([OrganizationResolutionObserver::class])]
class OrganizationResolution extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'organization_id',
        'resolution_id'
    ];
}
