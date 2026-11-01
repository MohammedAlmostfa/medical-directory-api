<?php

namespace Modules\Doctors\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Doctors\Models\Doctor;
use Modules\Locations\Models\Area;
use Modules\Specialties\Models\Specialty;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'specialty_id' => Specialty::query()->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Run SpecialtySeeder before DoctorFactory.'),

            'area_id' => Area::query()->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Run AreaSeeder before DoctorFactory.'),

            'name' => fake()->name(),
            'address' => fake()->address(),
            'map_url' => null,
            'phone' => fake()->numerify('011#######'),
            'mobile' => fake()->numerify('09########'),
            'whatsapp' => null,
            'email' => fake()->unique()->safeEmail(),
            'experience_years' => fake()->numberBetween(1, 35),
            'about' => fake()->paragraph(),
            'profile_image' => null,
            'is_published' => true,
        ];
    }
}
