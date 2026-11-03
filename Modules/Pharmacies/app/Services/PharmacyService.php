
<?php

namespace Modules\Pharmacies\Services;

use Illuminate\Support\Facades\DB;
use Modules\Pharmacies\Models\Pharmacy;

class PharmacyService
{
    public function create(array $data): Pharmacy
    {
        return Pharmacy::query()->create($data);
    }

    public function update(int $id, array $data): Pharmacy
    {
        $pharmacy = Pharmacy::query()->findOrFail($id);

        $pharmacy->update($data);

        return $pharmacy->refresh();
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id): void {
            $pharmacy = Pharmacy::query()->findOrFail($id);

            $pharmacy->workingHours()->delete();

            $pharmacy->delete();
        });
    }
}
