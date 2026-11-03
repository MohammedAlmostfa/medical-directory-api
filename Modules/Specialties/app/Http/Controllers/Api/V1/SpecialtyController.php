
<?php

namespace Modules\Specialties\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Specialties\Http\Requests\Api\V1\StoreSpecialtyRequest;
use Modules\Specialties\Http\Requests\Api\V1\UpdateSpecialtyRequest;
use Modules\Specialties\Http\Resources\SpecialtyResource;
use Modules\Specialties\Models\Specialty;
use Modules\Specialties\Services\SpecialtyService;

class SpecialtyController extends Controller
{
    public function __construct(
        private readonly SpecialtyService $specialtyService
    ) {}

    public function index(): AnonymousResourceCollection
    {
        $specialties = Specialty::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return SpecialtyResource::collection($specialties);
    }

    public function show(int $id): SpecialtyResource
    {
        $specialty = Specialty::query()
            ->where('is_active', true)
            ->findOrFail($id);

        return new SpecialtyResource($specialty);
    }

    public function store(StoreSpecialtyRequest $request): SpecialtyResource
    {
        $specialty = $this->specialtyService->create(
            $request->validated()
        );

        return new SpecialtyResource($specialty);
    }

    public function update(
        UpdateSpecialtyRequest $request,
        int $id
    ): SpecialtyResource {
        $specialty = $this->specialtyService->update(
            $id,
            $request->validated()
        );

        return new SpecialtyResource($specialty);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->specialtyService->delete($id);

        return response()->json([
            'message' => 'Specialty deleted successfully.',
        ]);
    }
}
