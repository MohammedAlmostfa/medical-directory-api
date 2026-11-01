<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Models\Governorate;

class GovernorateSeeder extends Seeder
{
    /**
     * Seed the Syrian governorates.
     */
    public function run(): void
    {
        $governorates = [
            'دمشق',
            'ريف دمشق',
            'حلب',
            'حمص',
            'حماة',
            'اللاذقية',
            'طرطوس',
            'إدلب',
            'درعا',
            'السويداء',
            'القنيطرة',
            'دير الزور',
            'الرقة',
            'الحسكة',
        ];

        foreach ($governorates as $name) {
            Governorate::query()->firstOrCreate(
                ['name' => $name],
                ['is_active' => true]
            );
        }
    }
}
