<?php

namespace App\Http\Requests;

use App\Enums\TypeOfRelationshipEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreForeignOrganizationPeopleRequest extends FormRequest
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
            'foreign_organization_id' => ['required', 'exists:foreign_organizations,id'],
            'person_id' => ['required', 'exists:people,id'],
            'type' => ['required', new Enum(TypeOfRelationshipEnum::class)],
        ];
    }
}
