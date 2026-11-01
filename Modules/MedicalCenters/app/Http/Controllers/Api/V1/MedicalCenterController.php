<?php

namespace Modules\MedicalCenters\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\MedicalCenters\Http\Resources\MedicalCenterResource;
use Modules\MedicalCenters\Models\MedicalCenter;

class MedicalCenterController extends Controller
{
    public function index()
    {
        $centers = MedicalCenter::query()
            ->where('is_published', true)
            ->with(['area.governorate', 'specialties'])
            ->orderBy('name')
            ->get();

        return MedicalCenterResource::collection($centers);
    }

    public function show(int $id)
    {
        $center = MedicalCenter::query()
            ->where('is_published', true)
            ->with(['area.governorate', 'specialties'])
            ->findOrFail($id);

        return new MedicalCenterResource($center);
    }
}
