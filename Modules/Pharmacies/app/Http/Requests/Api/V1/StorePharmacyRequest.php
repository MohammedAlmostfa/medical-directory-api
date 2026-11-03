
<?php

namespace Modules\Pharmacies\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePharmacyRequest extends FormRequest
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
        ];
    }
}
