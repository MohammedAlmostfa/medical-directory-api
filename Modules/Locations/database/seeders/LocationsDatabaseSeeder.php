<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GovernorateSeeder::class,
            AreaSeeder::class,
        ]);
    }
}
