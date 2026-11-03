<?php

namespace Modules\Laboratories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Laboratories\Database\Factories\LaboratoryFactory;
use Modules\Locations\Models\Area;
use Modules\WorkingHours\Models\WorkingHour;

class Laboratory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return LaboratoryFactory::new();
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
        'home_visit',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'home_visit' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the laboratory's area.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the services offered by this laboratory.
     */
    public function Services(): BelongsToMany
    {
        return $this->belongsToMany(
            LabService::class,
            'laboratory_lab_service',
            'laboratory_id',
            'lab_service_id'
        );
    }

    /**
     * Get the laboratory's working hours.
     */
    public function workingHours(): MorphMany
    {
        return $this->morphMany(WorkingHour::class, 'workable');
    }
}
