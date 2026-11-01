<?php

namespace Modules\Laboratories\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Laboratories\Models\LabService;

class LabServiceFactory extends Factory
{
    protected $model = LabService::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(3, true),
            'description' => fake()->optional()->sentence(),
            'is_active' => true,
        ];
    }
}
