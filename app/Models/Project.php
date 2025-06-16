<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Enums\ProjectTypeEnum;
use App\Enums\TypeOfWorkEnum;
use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ProjectObserver::class])]
class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'project_type',
        'type_of_work',
        'coordinate',
        'localization',
        'start_date',
        'end_date',
        'available',
    ];

    protected function casts(): array
    {
        return [
            'status' => GeneralStatusEnum::class,
            'project_type' => ProjectTypeEnum::class,
            'type_of_work' => TypeOfWorkEnum::class,
            'coordinate' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationProject::class)->withTimestamps()->withPivot('organization_id', 'resolution_id');
    }
}
