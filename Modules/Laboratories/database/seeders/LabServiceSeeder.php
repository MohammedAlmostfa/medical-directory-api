<?php

namespace Modules\Laboratories\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Laboratories\Models\LabService;

class LabServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            'تحاليل الدم',
            'تعداد الدم الكامل CBC',
            'تحليل سكر الدم',
            'تحليل HbA1c',
            'تحاليل وظائف الكبد',
            'تحاليل وظائف الكلى',
            'تحليل البول',
            'تحليل البراز',
            'تحاليل الغدة الدرقية',
            'تحاليل الهرمونات',
            'تحاليل الدهون والكوليسترول',
            'تحاليل التخثر',
            'تحاليل الفيتامينات',
            'تحاليل الحمل',
            'تحاليل المناعة',
            'الزرع الجرثومي',
            'تحاليل الحساسية',
            'تحاليل الأمراض المعدية',
        ];

        foreach ($services as $name) {
            LabService::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
