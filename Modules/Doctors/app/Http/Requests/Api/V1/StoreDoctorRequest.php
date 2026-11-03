
<?php

namespace Modules\Doctors\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'specialty_id' => [
                'required',
                'integer',
                'exists:specialties,id',
            ],
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
            'experience_years' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'about' => ['nullable', 'string'],
            'profile_image' => ['nullable', 'string'],
            'is_published' => ['sometimes', 'boolean'],
        ];
    }
}
