<?php

namespace App\Models;

use App\Enums\TypeOfRelationshipEnum;
use App\Observers\ForeignOrganizationPeopleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ForeignOrganizationPeopleObserver::class])]
class ForeignOrganizationPeople extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'foreign_organization_id',
        'person_id',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'type' => TypeOfRelationshipEnum::class,
        ];
    }
}
