<?php

namespace Modules\Laboratories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Laboratories\Database\Factories\LabServiceFactory;

class LabService extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return LabServiceFactory::new();
    }
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the laboratories that offer this service.
     */
    public function laboratories(): BelongsToMany
    {
        return $this->belongsToMany(
            Laboratory::class,
            'laboratory_lab_service',
            'lab_service_id',
            'laboratory_id'
        );
    }
}
