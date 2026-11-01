<?php

namespace Modules\Locations\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Locations\Http\Resources\AreaResource;
use Modules\Locations\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::query()
            ->where('is_active', true)
            ->whereHas('governorate', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('name')
            ->get();

        return AreaResource::collection($areas);
    }

    public function show(int $id): JsonResponse|AreaResource
    {
        $area = Area::query()
            ->where('is_active', true)
            ->whereHas('governorate', function ($query) {
                $query->where('is_active', true);
            })
            ->findOrFail($id);

        return new AreaResource($area);
    }
}
