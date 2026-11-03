
<?php

namespace Modules\Doctors\Services;

use Illuminate\Support\Facades\DB;
use Modules\Doctors\Models\Doctor;

class DoctorService
{
    public function create(array $data): Doctor
    {
        return Doctor::query()->create($data);
    }

    public function update(int $id, array $data): Doctor
    {
        $doctor = Doctor::query()->findOrFail($id);

        $doctor->update($data);

        return $doctor->refresh();
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id): void {
            $doctor = Doctor::query()->findOrFail($id);

            $doctor->workingHours()->delete();

            $doctor->delete();
        });
    }
}
