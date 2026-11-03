
<?php

namespace Modules\MedicalCenters\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\MedicalCenters\Http\Requests\Api\V1\StoreMedicalCenterRequest;
use Modules\MedicalCenters\Http\Requests\Api\V1\UpdateMedicalCenterRequest;
use Modules\MedicalCenters\Http\Resources\MedicalCenterResource;
use Modules\MedicalCenters\Models\MedicalCenter;
use Modules\MedicalCenters\Services\MedicalCenterService;

class MedicalCenterController extends Controller
{
    public function __construct(
        private readonly MedicalCenterService $medicalCenterService
    ) {}

    public function index(): AnonymousResourceCollection
    {
        $medicalCenters = MedicalCenter::query()
            ->with(['area.governorate', 'specialties', 'workingHours'])
            ->where('is_published', true)
            ->orderBy('name')
            ->get();

        return MedicalCenterResource::collection($medicalCenters);
    }

    public function show(int $id): MedicalCenterResource
    {
        $medicalCenter = MedicalCenter::query()
            ->with(['area.governorate', 'specialties', 'workingHours'])
            ->where('is_published', true)
            ->findOrFail($id);

        return new MedicalCenterResource($medicalCenter);
    }

    public function store(
        StoreMedicalCenterRequest $request
    ): MedicalCenterResource {
        $medicalCenter = $this->medicalCenterService->create(
            $request->validated()
        );

        $medicalCenter->load([
            'area.governorate',
            'specialties',
            'workingHours',
        ]);

        return new MedicalCenterResource($medicalCenter);
    }

    public function update(
        UpdateMedicalCenterRequest $request,
        int $id
    ): MedicalCenterResource {
        $medicalCenter = $this->medicalCenterService->update(
            $id,
            $request->validated()
        );

        $medicalCenter->load([
            'area.governorate',
            'specialties',
            'workingHours',
        ]);

        return new MedicalCenterResource($medicalCenter);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->medicalCenterService->delete($id);

        return response()->json([
            'message' => 'Medical center deleted successfully.',
        ]);
    }
}
