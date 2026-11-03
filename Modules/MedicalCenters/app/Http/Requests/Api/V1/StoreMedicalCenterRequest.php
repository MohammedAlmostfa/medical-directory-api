
<?php

namespace Modules\MedicalCenters\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalCenterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'area_id' => [
                'required',
                'integer',
                'exists:areas,id',
            ],
            'type' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'map_url' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'mobile' => ['nullable', 'string'],
            'whatsapp' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'is_published' => ['sometimes', 'boolean'],

            'specialty_ids' => ['sometimes', 'array'],
            'specialty_ids.*' => [
                'required',
                'integer',
                'distinct',
                'exists:specialties,id',
            ],
        ];
    }
}
