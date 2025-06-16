<?php

namespace App\Models;

use App\Observers\OrganizationProjectObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([OrganizationProjectObserver::class])]
class OrganizationProject extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'organization_id',
        'project_id',
    ];
}
