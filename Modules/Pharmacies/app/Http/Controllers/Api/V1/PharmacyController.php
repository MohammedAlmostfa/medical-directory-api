
<?php

namespace Modules\Pharmacies\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Pharmacies\Http\Requests\Api\V1\StorePharmacyRequest;
use Modules\Pharmacies\Http\Requests\Api\V1\UpdatePharmacyRequest;
use Modules\Pharmacies\Http\Resources\PharmacyResource;
use Modules\Pharmacies\Models\Pharmacy;
use Modules\Pharmacies\Services\PharmacyService;

class PharmacyController extends Controller
{
    public function __construct(
        private readonly PharmacyService $pharmacyService
    ) {}

    public function index(): AnonymousResourceCollection
    {
        $pharmacies = Pharmacy::query()
            ->with(['area.governorate', 'workingHours'])
            ->where('is_published', true)
            ->orderBy('name')
            ->get();

        return PharmacyResource::collection($pharmacies);
    }

    public function show(int $id): PharmacyResource
    {
        $pharmacy = Pharmacy::query()
            ->with(['area.governorate', 'workingHours'])
            ->where('is_published', true)
            ->findOrFail($id);

        return new PharmacyResource($pharmacy);
    }

    public function store(StorePharmacyRequest $request): PharmacyResource
    {
        $pharmacy = $this->pharmacyService->create(
            $request->validated()
        );

        $pharmacy->load(['area.governorate', 'workingHours']);

        return new PharmacyResource($pharmacy);
    }

    public function update(
        UpdatePharmacyRequest $request,
        int $id
    ): PharmacyResource {
        $pharmacy = $this->pharmacyService->update(
            $id,
            $request->validated()
        );

        $pharmacy->load(['area.governorate', 'workingHours']);

        return new PharmacyResource($pharmacy);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->pharmacyService->delete($id);

        return response()->json([
            'message' => 'Pharmacy deleted successfully.',
        ]);
    }
}
