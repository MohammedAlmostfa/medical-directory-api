<?php

namespace Modules\Specialties\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Doctors\Models\Doctor;
use Modules\MedicalCenters\Models\MedicalCenter;
use Modules\Specialties\Database\Factories\SpecialtyFactory;

class Specialty extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return SpecialtyFactory::new();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the doctors associated with this specialty.
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    /**
     * Get the medical centers associated with this specialty.
     */
    public function medicalCenters(): BelongsToMany
    {
        return $this->belongsToMany(MedicalCenter::class);
    }
}
