<?php

namespace App\Models;

use App\Enums\ForeignOrganizationTypeEnum;
use App\Enums\GeneralStatusEnum;
use App\Observers\ForeignOrganizationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ForeignOrganizationObserver::class])]
class ForeignOrganization extends Model
{
    /** @use HasFactory<\Database\Factories\ForeignOrganizationFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'subcategory_id',
        'company_name',
        'fantasy_name',
        'slug',
        'other_name',
        'type',
        'abstract',
        'description',
        'founding_date',
        'dissolution_date',
        'image_path',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'type' => ForeignOrganizationTypeEnum::class,
            'status' => GeneralStatusEnum::class,
        ];
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
    
    public function person(): BelongsToMany
    {
        return $this->belongsToMany(People::class)->using(ForeignOrganizationPeople::class)->withTimestamps()->withPivot('foreign_organization_id','person_id','type');
    }

    public function identifications(): HasMany
    {
        return $this->hasMany(Identification::class);
    }

    /* public function culturalStatisticsFrameworks(): HasMany
    {
        return $this->hasMany(CulturalStatisticsFramework::class);
    } */
}
