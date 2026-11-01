<?php

namespace Modules\MedicalCenters\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Locations\Models\Area;
use Modules\MedicalCenters\Database\Factories\MedicalCenterFactory;
use Modules\Specialties\Models\Specialty;
use Modules\WorkingHours\Models\WorkingHour;

class MedicalCenter extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return MedicalCenterFactory::new();
    }
    protected $fillable = [
        'area_id',
        'type',
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
     * Get the medical center's area.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the specialties offered by this medical center.
     */
    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(
            Specialty::class,
            'medical_center_specialty',
            'medical_center_id',
            'specialty_id'
        );
    }

    /**
     * Get the medical center's working hours.
     */
    public function workingHours(): MorphMany
    {
        return $this->morphMany(WorkingHour::class, 'workable');
    }
}
