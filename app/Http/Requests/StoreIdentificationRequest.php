<?php

namespace App\Http\Requests;

use App\Enums\IdentificationTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreIdentificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'foreign_organization_id' => ['nullable', 'exists:foreign_organizations,id'],
            'person_id' => ['nullable', 'exists:people,id'],
            'type' => ['nullable', new Enum(IdentificationTypeEnum::class)],
            'value' => ['nullable', 'string', 'max:80'],
        ];
    }
}
