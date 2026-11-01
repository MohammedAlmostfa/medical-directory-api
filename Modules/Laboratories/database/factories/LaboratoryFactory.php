<?php

namespace Modules\Laboratories\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Laboratories\Models\Laboratory;
use Modules\Locations\Models\Area;

class LaboratoryFactory extends Factory
{
    protected $model = Laboratory::class;

    public function definition(): array
    {
        return [
            'area_id' => Area::query()->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Run AreaSeeder before LaboratoryFactory.'),

            'name' => fake()->company() . ' Laboratory',
            'address' => fake()->address(),
            'map_url' => null,
            'phone' => fake()->numerify('011#######'),
            'mobile' => fake()->numerify('09########'),
            'whatsapp' => null,
            'email' => fake()->unique()->safeEmail(),
            'description' => fake()->paragraph(),
            'image' => null,
            'home_visit' => fake()->boolean(20),
            'is_published' => true,
        ];
    }
}
