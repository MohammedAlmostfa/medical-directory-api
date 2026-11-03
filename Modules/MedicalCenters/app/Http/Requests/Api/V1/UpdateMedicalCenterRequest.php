
<?php

namespace Modules\MedicalCenters\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicalCenterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'area_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:areas,id',
            ],
            'type' => ['sometimes', 'required', 'string', 'max:100'],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'address' => ['sometimes', 'nullable', 'string'],
            'map_url' => ['sometimes', 'nullable', 'string'],
            'phone' => ['sometimes', 'nullable', 'string'],
            'mobile' => ['sometimes', 'nullable', 'string'],
            'whatsapp' => ['sometimes', 'nullable', 'string'],
            'email' => ['sometimes', 'nullable', 'email', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string'],
            'image' => ['sometimes', 'nullable', 'string'],
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
