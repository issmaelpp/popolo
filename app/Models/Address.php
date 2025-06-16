<?php

namespace App\Models;

use App\Enums\AddressTypeEnum;
use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CategoryObserver::class])]
class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'organization_id',
        'foreign_organization_id',
        'person_id',
        'neighborhood_id',
        'traffic_line_id',
        'height',
        'house_number',
        'plot_number',
        'field_number',
        'floor_number',
        'additional_description',
        'coordinate',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'coordinate' => 'array',
            'type' => AddressTypeEnum::class,
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function foreignOrganization(): BelongsTo
    {
        return $this->belongsTo(ForeignOrganization::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function traffic_line(): BelongsTo
    {
        return $this->belongsTo(TrafficLine::class);
    }
}
