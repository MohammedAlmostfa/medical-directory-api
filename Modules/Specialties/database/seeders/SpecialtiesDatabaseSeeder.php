<?php

namespace Modules\Specialties\Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialtiesDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SpecialtySeeder::class,
        ]);
    }
}
