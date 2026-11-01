<?php

namespace Modules\Laboratories\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Laboratories\Http\Resources\LaboratoryResource;
use Modules\Laboratories\Models\Laboratory;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::query()
            ->where('is_published', true)
            ->with(['area.governorate', 'services'])
            ->orderBy('name')
            ->get();

        return LaboratoryResource::collection($laboratories);
    }

    public function show(int $id)
    {
        $laboratory = Laboratory::query()
            ->where('is_published', true)
            ->with(['area.governorate', 'services'])
            ->findOrFail($id);

        return new LaboratoryResource($laboratory);
    }
}
