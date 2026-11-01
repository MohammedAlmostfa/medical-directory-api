<?php

namespace Modules\Laboratories\Database\Seeders;

use Illuminate\Database\Seeder;

class LaboratoriesDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LabServiceSeeder::class,
        ]);
    }
}
