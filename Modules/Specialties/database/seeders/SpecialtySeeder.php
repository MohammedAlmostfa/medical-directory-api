<?php

namespace Modules\Specialties\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Specialties\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    public function run(): void
    {
        $specialties = [
            'طب عام',
            'طب الأطفال',
            'طب القلب',
            'الأمراض الداخلية',
            'الجراحة العامة',
            'جراحة العظام',
            'الأمراض الجلدية',
            'طب العيون',
            'الأنف والأذن والحنجرة',
            'طب الأسنان',
            'تقويم الأسنان',
            'أمراض النساء والتوليد',
            'المسالك البولية',
            'الأمراض العصبية',
            'الأمراض النفسية',
            'الأمراض الصدرية',
            'أمراض الجهاز الهضمي',
            'أمراض الكلى',
            'الغدد الصماء والسكري',
            'أمراض الدم',
            'الأورام',
            'طب الأسرة',
            'الطب الفيزيائي وإعادة التأهيل',
            'التخدير والإنعاش',
            'الأشعة والتصوير الطبي',
            'الطب المخبري',
            'الطب الشرعي',
        ];

        foreach ($specialties as $name) {
            Specialty::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}
