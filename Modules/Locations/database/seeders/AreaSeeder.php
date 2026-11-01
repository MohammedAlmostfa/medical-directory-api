<?php

namespace Modules\Locations\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locations\Models\Area;
use Modules\Locations\Models\Governorate;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'دمشق' => [
                'المزة',
                'الميدان',
                'ركن الدين',
                'برزة',
                'كفرسوسة',
                'المهاجرين',
                'القصاع',
                'باب توما',
                'الشعلان',
            ],
            'ريف دمشق' => [
                'جرمانا',
                'صحنايا',
                'داريا',
                'قدسيا',
                'التل',
                'الزبداني',
                'دوما',
                'حرستا',
                'جديدة عرطوز',
                'معضمية الشام',
            ],
            'حمص' => [
                'حمص المدينة',
                'تلكلخ',
                'الرستن',
                'تدمر',
            ],
            'حلب' => [
                'حلب المدينة',
                'منبج',
                'عفرين',
                'اعزاز',
            ],
            'حماة' => [
                'حماة المدينة',
                'السلمية',
                'مصياف',
            ],
            'اللاذقية' => [
                'اللاذقية المدينة',
                'جبلة',
                'القرداحة',
            ],
            'طرطوس' => [
                'طرطوس المدينة',
                'بانياس',
                'صافيتا',
            ],
            'درعا' => [
                'درعا المدينة',
                'إزرع',
                'نوى',
            ],
            'السويداء' => [
                'السويداء المدينة',
                'شهبا',
            ],
            'إدلب' => [
                'إدلب المدينة',
                'معرة النعمان',
                'جسر الشغور',
            ],
            'دير الزور' => [
                'دير الزور المدينة',
                'الميادين',
                'البوكمال',
            ],
            'الرقة' => [
                'الرقة المدينة',
                'تل أبيض',
            ],
            'الحسكة' => [
                'الحسكة المدينة',
                'القامشلي',
                'رأس العين',
            ],
            'القنيطرة' => [
                'مدينة القنيطرة',
            ],
        ];

        foreach ($areas as $governorateName => $areaNames) {
            $governorate = Governorate::query()
                ->where('name', $governorateName)
                ->first();

            if ($governorate === null) {
                continue;
            }

            foreach ($areaNames as $areaName) {
                Area::query()->firstOrCreate(
                    [
                        'governorate_id' => $governorate->id,
                        'name' => $areaName,
                    ],
                    [
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
