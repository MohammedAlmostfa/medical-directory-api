
<?php

namespace Modules\Doctors\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Doctors\Http\Requests\Api\V1\StoreDoctorRequest;
use Modules\Doctors\Http\Requests\Api\V1\UpdateDoctorRequest;
use Modules\Doctors\Http\Resources\DoctorResource;
use Modules\Doctors\Models\Doctor;
use Modules\Doctors\Services\DoctorService;

class DoctorController extends Controller
{
    public function __construct(
        private readonly DoctorService $doctorService
    ) {}

    public function index(): AnonymousResourceCollection
    {
        $doctors = Doctor::query()
            ->with(['specialty', 'area.governorate', 'workingHours'])
            ->where('is_published', true)
            ->orderBy('name')
            ->get();

        return DoctorResource::collection($doctors);
    }

    public function show(int $id): DoctorResource
    {
        $doctor = Doctor::query()
            ->with(['specialty', 'area.governorate', 'workingHours'])
            ->where('is_published', true)
            ->findOrFail($id);

        return new DoctorResource($doctor);
    }

    public function store(StoreDoctorRequest $request): DoctorResource
    {
        $doctor = $this->doctorService->create(
            $request->validated()
        );

        $doctor->load(['specialty', 'area.governorate', 'workingHours']);

        return new DoctorResource($doctor);
    }

    public function update(
        UpdateDoctorRequest $request,
        int $id
    ): DoctorResource {
        $doctor = $this->doctorService->update(
            $id,
            $request->validated()
        );

        $doctor->load(['specialty', 'area.governorate', 'workingHours']);

        return new DoctorResource($doctor);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->doctorService->delete($id);

        return response()->json([
            'message' => 'Doctor deleted successfully.',
        ]);
    }
}
