<?php

namespace Modules\Locations\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Locations\Http\Resources\GovernorateResource;
use Modules\Locations\Models\Governorate;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return GovernorateResource::collection($governorates);
    }

    public function show(int $id): JsonResponse|GovernorateResource
    {
        $governorate = Governorate::query()
            ->where('is_active', true)
            ->findOrFail($id);

        return new GovernorateResource($governorate);
    }
}
