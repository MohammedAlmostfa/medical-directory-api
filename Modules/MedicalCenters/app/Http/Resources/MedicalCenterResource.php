<?php

namespace Modules\MedicalCenters\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalCenterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'address' => $this->address,
            'map_url' => $this->map_url,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'whatsapp' => $this->whatsapp,
            'description' => $this->description,
            'image' => $this->image,

            'specialties' => $this->whenLoaded(
                'specialties',
                fn () => $this->specialties->map(fn ($specialty) => [
                    'id' => $specialty->id,
                    'name' => $specialty->name,
                ])->values()
            ),

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
