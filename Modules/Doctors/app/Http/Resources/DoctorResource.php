<?php

namespace Modules\Doctors\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'map_url' => $this->map_url,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'whatsapp' => $this->whatsapp,
            'experience_years' => $this->experience_years,
            'about' => $this->about,
            'profile_image' => $this->profile_image,

            'workingHours' => $this->whenLoaded(
                'workingHours',
                fn () => $this->workingHours->map(fn ($workingHour) => [
                    'id' => $workingHour->id,
                    'day_of_week' => $workingHour->day_of_week,
                    'start_minute' => $workingHour->start_minute,
                    'end_minute' => $workingHour->end_minute,
                ])->values()
            ),

            'specialty' => $this->whenLoaded('specialty', fn () => [
                'id' => $this->specialty?->id,
                'name' => $this->specialty?->name,
            ]),

            'area' => $this->whenLoaded('area', fn () => [
                'id' => $this->area?->id,
                'name' => $this->area?->name,

                'governorate' => $this->area?->relationLoaded('governorate')
                    ? [
                        'id' => $this->area->governorate?->id,
                        'name' => $this->area->governorate?->name,
                    ]
                    : null,
            ]),
        ];
    }
}
