<?php

namespace App\Http\Requests;

use App\Enums\ForeignOrganizationTypeEnum;
use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreForeignOrganizationRequest extends FormRequest
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
            'subcategory_id' => ['required', 'exists:subcategories,id'],
            'company_name' => ['required', 'string', 'max:120'],
            'fantasy_name' => ['nullable', 'string', 'max:120'],
            'slug' => ['required', 'string', 'max:150', 'unique:foreign_organizations,slug'],
            'other_name' => ['nullable', 'json'],
            'type' => ['required', new Enum(ForeignOrganizationTypeEnum::class)],
            'abstract' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'founding_date' => ['nullable', 'date'],
            'dissolution_date' => ['nullable', 'date'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
        ];
    }
}
