<?php

namespace Modules\Specialties\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Specialties\Http\Resources\SpecialtyResource;
use Modules\Specialties\Models\Specialty;

class SpecialtyController extends Controller
{
    public function index()
    {
        return SpecialtyResource::collection(
            Specialty::query()
                ->where('is_active', true)
                ->orderBy('name')
                ->get()
        );
    }

    public function show(int $id)
    {
        $specialty = Specialty::query()
            ->where('is_active', true)
            ->findOrFail($id);

        return new SpecialtyResource($specialty);
    }
}
