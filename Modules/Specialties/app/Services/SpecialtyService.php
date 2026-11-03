
<?php

namespace Modules\Specialties\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Modules\Specialties\Models\Specialty;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class SpecialtyService
{
    public function create(array $data): Specialty
    {
        return Specialty::query()->create($data);
    }

    public function update(int $id, array $data): Specialty
    {
        $specialty = Specialty::query()->findOrFail($id);

        $specialty->update($data);

        return $specialty->refresh();
    }

    public function delete(int $id): void
    {
        $specialty = Specialty::query()->findOrFail($id);

        if ($specialty->doctors()->exists() ||
            $specialty->medicalCenters()->exists()) {
            throw new ConflictHttpException(
                'Cannot delete a specialty that is associated with doctors or medical centers.'
            );
        }

        $specialty->delete();
    }
}
