<?php

namespace Modules\Pharmacies\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Locations\Models\Area;
use Modules\Pharmacies\Database\Factories\PharmacyFactory;
use Modules\WorkingHours\Models\WorkingHour;

class Pharmacy extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return PharmacyFactory::new();
    }
    protected $fillable = [
        'area_id',
        'name',
        'address',
        'map_url',
        'phone',
        'mobile',
        'whatsapp',
        'email',
        'description',
        'image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the pharmacy's area.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the pharmacy's working hours.
     */
    public function workingHours(): MorphMany
    {
        return $this->morphMany(WorkingHour::class, 'workable');
    }
}
