<?php

namespace Modules\Doctors\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Doctors\Http\Resources\DoctorResource;
use Modules\Doctors\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::query()
            ->where('is_published', true)
            ->with(['specialty', 'area.governorate'])
            ->orderBy('name')
            ->get();

        return DoctorResource::collection($doctors);
    }

    public function show(int $id)
    {
        $doctor = Doctor::query()
            ->where('is_published', true)
            ->with(['specialty', 'area.governorate'])
            ->findOrFail($id);

        return new DoctorResource($doctor);
    }
}
