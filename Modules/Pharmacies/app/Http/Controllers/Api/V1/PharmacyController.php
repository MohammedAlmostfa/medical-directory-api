<?php

namespace Modules\Pharmacies\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Pharmacies\Http\Resources\PharmacyResource;
use Modules\Pharmacies\Models\Pharmacy;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::query()
            ->where('is_published', true)
            ->with(['area.governorate'])
            ->orderBy('name')
            ->get();

        return PharmacyResource::collection($pharmacies);
    }

    public function show(int $id)
    {
        $pharmacy = Pharmacy::query()
            ->where('is_published', true)
            ->with(['area.governorate'])
            ->findOrFail($id);

        return new PharmacyResource($pharmacy);
    }
}
