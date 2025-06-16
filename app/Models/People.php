<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\GeneralStatusEnum;
use App\Observers\PeopleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([PeopleObserver::class])]
class People extends Model
{
    /** @use HasFactory<\Database\Factories\PeopleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'user_id',
        'family_name',
        'given_name',
        'additional_name',
        'other_name',
        'honorific_suffix',
        'gender',
        'birth_date',
        'death_date',
        'summary',
        'biography',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'gender' => GenderEnum::class,
            'birth_date' => 'date',
            'death_date' => 'date',
            'status' => GeneralStatusEnum::class
        ];
    }

    protected function dni(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->identifications()->where('type', 'D.N.I.')->value('value'),
        )->shouldCache();
    }

    protected $appends = ['full_name'];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(' ', array_filter([$this->given_name, $this->additional_name, $this->family_name])),
        )->shouldCache();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationPeople::class)->withTimestamps()->withPivot('organization_id','person_id','role','membership_status','type','start_date','end_date','cessation_reason');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function foreignOrganizations(): BelongsToMany
    {
        return $this->belongsToMany(ForeignOrganization::class)->using(ForeignOrganizationPeople::class)->withTimestamps()->withPivot('foreign_organization_id','person_id','type');
    }

    public function identifications(): HasMany
    {
        return $this->hasMany(Identification::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /* public function culturalStatisticsFrameworks(): HasMany
    {
        return $this->hasMany(CulturalStatisticsFramework::class);
    } */

    public function civilRequests(): HasMany
    {
        return $this->hasMany(CivilRequest::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function stateResponses(): HasMany
    {
        return $this->hasMany(StateResponse::class);
    }

    public function councilPosts(): HasMany
    {
        return $this->hasMany(CouncilPost::class);
    }

    public function spechs(): HasMany
    {
        return $this->hasMany(Speech::class);
    }

    public function registrants(): HasMany
    {
        return $this->hasMany(Registrant::class);
    }
}
