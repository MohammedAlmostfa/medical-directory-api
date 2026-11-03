
<?php

namespace Modules\MedicalCenters\Services;

use Illuminate\Support\Facades\DB;
use Modules\MedicalCenters\Models\MedicalCenter;

class MedicalCenterService
{
    public function create(array $data): MedicalCenter
    {
        return DB::transaction(function () use ($data): MedicalCenter {
            $specialtyIds = $data['specialty_ids'] ?? [];

            unset($data['specialty_ids']);

            $medicalCenter = MedicalCenter::query()->create($data);

            $medicalCenter->specialties()->sync($specialtyIds);

            return $medicalCenter;
        });
    }

    public function update(int $id, array $data): MedicalCenter
    {
        return DB::transaction(function () use ($id, $data): MedicalCenter {
            $medicalCenter = MedicalCenter::query()->findOrFail($id);

            if (array_key_exists('specialty_ids', $data)) {
                $medicalCenter->specialties()->sync($data['specialty_ids']);
                unset($data['specialty_ids']);
            }

            $medicalCenter->update($data);

            return $medicalCenter->refresh();
        });
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id): void {
            $medicalCenter = MedicalCenter::query()->findOrFail($id);

            $medicalCenter->workingHours()->delete();
            $medicalCenter->specialties()->detach();

            $medicalCenter->delete();
        });
    }
}
