<?php

namespace Modules\Specialties\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialtyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Specialties\Models\Specialty::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

