<?php

namespace App\Models;

use App\Enums\ClassificationEnum;
use App\Enums\GeneralStatusEnum;
use App\Observers\OrganizationObserver;
use App\Services\WordFormatterService;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([OrganizationObserver::class])]
class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'parent_id',
        'classification',
        'name',
        'full_name',
        'slug',
        'other_name',
        'abstract',
        'description',
        'founding_date',
        'dissolution_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'classification' => ClassificationEnum::class,
            'founding_date' => 'date',
            'dissolution_date' => 'date',
            'status' => GeneralStatusEnum::class,
        ];
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => app(WordFormatterService::class)->format($value)
        );
    }

    protected static function booted(): void
    {
        static::creating(function (Organization $model) {
            $model->full_name = "{$model->classification->getLabel()} {$model->name}";
            $model->slug = Str::slug("{$model->classification->getLabel()}-{$model->name}");
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Organization::class, 'parent_id');
    }

    public function person(): BelongsToMany
    {
        return $this->belongsToMany(People::class)->using(OrganizationPeople::class)->withTimestamps()->withPivot('organization_id','person_id','role','membership_status','type','start_date','end_date','cessation_reason');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)->using(ArticleOrganization::class)->withTimestamps()->withPivot('organization_id', 'article_id');
    }

    public function resolutions(): BelongsToMany
    {
        return $this->belongsToMany(Resolution::class)->using(OrganizationResolution::class)->withTimestamps()->withPivot('organization_id', 'resolution_id');
    }

    /* public function quickResponses(): HasMany
    {
        return $this->hasMany(QuickResponse::class);
    } */

    public function stateResponses(): HasMany
    {
        return $this->hasMany(StateResponse::class);
    }

    // tiene que ser una relcion muchos a muchos
    /* public function councilPosts(): HasMany
    {
        return $this->hasMany(CouncilPost::class);
    } */

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)->using(OrganizationProject::class)->withTimestamps()->withPivot('organization_id', 'project_id');
    }

    public function voteEvents(): HasMany
    {
        return $this->hasMany(VoteEvent::class);
    }
}
