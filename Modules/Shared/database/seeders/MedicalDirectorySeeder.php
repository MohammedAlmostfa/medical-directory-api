<?php

namespace Modules\Shared\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Doctors\Models\Doctor;
use Modules\Laboratories\Models\Laboratory;
use Modules\Laboratories\Models\LabService;
use Modules\Locations\Database\Seeders\LocationsDatabaseSeeder;
use Modules\MedicalCenters\Models\MedicalCenter;
use Modules\Pharmacies\Models\Pharmacy;
use Modules\Specialties\Database\Seeders\SpecialtiesDatabaseSeeder;
use Modules\WorkingHours\Models\WorkingHour;

class MedicalDirectorySeeder extends Seeder
{
    public function run(): void
    {
        // 1. البيانات الأساسية التي تعتمد عليها الجهات الطبية.
        $this->call([
            LocationsDatabaseSeeder::class,
            SpecialtiesDatabaseSeeder::class,
        ]);

        // 2. خدمات المخابر.
        $this->call([
            \Modules\Laboratories\Database\Seeders\LaboratoriesDatabaseSeeder::class,
        ]);

        // 3. إنشاء الجهات الطبية.
        $doctors = Doctor::factory()->count(30)->create();
        $medicalCenters = MedicalCenter::factory()->count(10)->create();
        $laboratories = Laboratory::factory()->count(15)->create();
        $pharmacies = Pharmacy::factory()->count(20)->create();

        // 4. ربط الاختصاصات بالمراكز الطبية.
        $specialtyIds = \Modules\Specialties\Models\Specialty::query()
            ->where('is_active', true)
            ->pluck('id');

        foreach ($medicalCenters as $center) {
            $center->specialties()->sync(
                $specialtyIds->shuffle()->take(fake()->numberBetween(1, 4))->all()
            );
        }

        // 5. ربط الخدمات بالمخابر.
        $serviceIds = LabService::query()
            ->where('is_active', true)
            ->pluck('id');

        foreach ($laboratories as $laboratory) {
            $laboratory->labServices()->sync(
                $serviceIds->shuffle()->take(fake()->numberBetween(3, 8))->all()
            );
        }

        // 6. إنشاء أوقات الدوام لكل جهة.
        foreach ([$doctors, $medicalCenters, $laboratories, $pharmacies] as $entities) {
            foreach ($entities as $entity) {
                $this->createWorkingHours($entity);
            }
        }
    }

    private function createWorkingHours(object $entity): void
    {
        // الأحد إلى الخميس.
        foreach (range(0, 4) as $day) {
            $entity->workingHours()->create([
                ...WorkingHour::factory()->make()->getAttributes(),
                'day_of_week' => $day,
                'start_minute' => 540, // 09:00
                'end_minute' => 1020,  // 17:00
            ]);
        }
    }
}
