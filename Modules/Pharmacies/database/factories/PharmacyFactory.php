<?php

namespace Modules\Pharmacies\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Locations\Models\Area;
use Modules\Pharmacies\Models\Pharmacy;

class PharmacyFactory extends Factory
{
    protected $model = Pharmacy::class;

    public function definition(): array
    {
        return [
            'area_id' => Area::query()->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Run AreaSeeder before PharmacyFactory.'),

            'name' => fake()->company() . ' Pharmacy',
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
