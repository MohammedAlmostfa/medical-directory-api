<?php

namespace Modules\WorkingHours\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\WorkingHours\Database\Factories\WorkingHourFactory;

class WorkingHour extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return WorkingHourFactory::new();
    }
    protected $fillable = [
        'day_of_week',
        'start_minute',
        'end_minute',
    ];

    protected function casts(): array
    {
        return [
            'day_of_week' => 'integer',
            'start_minute' => 'integer',
            'end_minute' => 'integer',
        ];
    }

    /**
     * Get the entity this working hour belongs to.
     */
    public function workable(): MorphTo
    {
        return $this->morphTo();
    }
}
