<?php

namespace Modules\Doctors\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Doctors\Database\Factories\DoctorFactory;
use Modules\Locations\Models\Area;
use Modules\Specialties\Models\Specialty;
use Modules\WorkingHours\Models\WorkingHour;

class Doctor extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return DoctorFactory::new();
    }
    protected $fillable = [
        'specialty_id',
        'area_id',
        'name',
        'address',
        'map_url',
        'phone',
        'mobile',
        'whatsapp',
        'email',
        'experience_years',
        'about',
        'profile_image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'experience_years' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the doctor's specialty.
     */
    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }

    /**
     * Get the doctor's area.
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the doctor's working hours.
     */
    public function workingHours(): MorphMany
    {
        return $this->morphMany(WorkingHour::class, 'workable');
    }
}
