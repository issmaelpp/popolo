<?php

namespace App\Models;

use App\Enums\MembershipRoleEnum;
use App\Enums\MembershipStatusEnum;
use App\Enums\MembershipTypeEnum;
use App\Observers\OrganizationPeopleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([OrganizationPeopleObserver::class])]
class OrganizationPeople extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'organization_id',
        'person_id',
        'role',
        'membership_status',
        'type',
        'start_date',
        'end_date',
        'cessation_reason',
    ];

    protected function casts(): array
    {
        return [
            'role' => MembershipRoleEnum::class,
            'membership_status' => MembershipStatusEnum::class,
            'type' => MembershipTypeEnum::class,
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }
}
