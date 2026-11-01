<?php

namespace Modules\WorkingHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\WorkingHours\Models\WorkingHour;

class WorkingHourFactory extends Factory
{
    protected $model = WorkingHour::class;

    public function definition(): array
    {
        $startMinute = fake()->randomElement([
            480, // 08:00
            510, // 08:30
            540, // 09:00
            600, // 10:00
        ]);

        $endMinute = fake()->randomElement([
            720,  // 12:00
            780,  // 13:00
            840,  // 14:00
            960,  // 16:00
            1020, // 17:00
        ]);

        return [
            'day_of_week' => fake()->numberBetween(0, 6),
            'start_minute' => $startMinute,
            'end_minute' => $endMinute,
        ];
    }
}
