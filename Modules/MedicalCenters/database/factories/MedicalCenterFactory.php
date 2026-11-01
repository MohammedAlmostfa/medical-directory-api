<?php

namespace Modules\MedicalCenters\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Locations\Models\Area;
use Modules\MedicalCenters\Models\MedicalCenter;

class MedicalCenterFactory extends Factory
{
    protected $model = MedicalCenter::class;

    public function definition(): array
    {
        return [
            'area_id' => Area::query()->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Run AreaSeeder before MedicalCenterFactory.'),

            'type' => fake()->randomElement([
                'clinic',
                'medical_center',
                'hospital',
            ]),

            'name' => fake()->company() . ' Medical Center',
            'address' => fake()->address(),
            'map_url' => null,
            'phone' => fake()->numerify('011#######'),
            'mobile' => fake()->numerify('09########'),
            'whatsapp' => null,
            'email' => fake()->unique()->safeEmail(),
            'description' => fake()->paragraph(),
            'image' => null,
            'is_published' => true,
        ];
    }
}
