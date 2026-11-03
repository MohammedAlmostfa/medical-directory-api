
<?php

namespace Modules\Doctors\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'specialty_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:specialties,id',
            ],
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
            'experience_years' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],
            'about' => ['sometimes', 'nullable', 'string'],
            'profile_image' => ['sometimes', 'nullable', 'string'],
            'is_published' => ['sometimes', 'boolean'],
        ];
    }
}
