<?php

namespace App\Http\Requests;

use App\Enums\AddressTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreAddressRequest extends FormRequest
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
            'organization_id' => 'nullable|exists:organizations,id',
            'foreign_organization_id' => 'nullable|exists:foreign_organizations,id',
            'person_id' => 'nullable|exists:people,id',
            'neighborhood_id' => 'nullable|exists:neighborhoods,id',
            'traffic_line_id' => 'nullable|exists:traffic_lines,id',
            'height' => 'nullable|string|max:10',
            'house_number' => 'nullable|string|max:10',
            'plot_number' => 'nullable|string|max:10',
            'field_number' => 'nullable|string|max:10',
            'floor_number' => 'nullable|string|max:3',
            'additional_description' => 'nullable|string|max:255',
            'coordinate' => 'nullable|array',
            'coordinate.latitude' => 'required_with:coordinate|numeric',
            'coordinate.longitude' => 'required_with:coordinate|numeric',
            'type' => ['nullable', new Enum(AddressTypeEnum::class)],
        ];
    }
}
