
<?php

namespace Modules\Pharmacies\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePharmacyRequest extends FormRequest
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
        ];
    }
}
