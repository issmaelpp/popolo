<?php

namespace App\Http\Requests;

use App\Enums\ClassificationEnum;
use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOrganizationRequest extends FormRequest
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
            'parent_id' => ['nullable', 'exists:organizations,id'],
            'classification' => ['required', new Enum(ClassificationEnum::class)],
            'name' => ['required', 'string', 'max:120'],
            'full_name' => ['required', 'string', 'max:150', 'unique:organizations,full_name'],
            'slug' => ['required', 'string', 'max:180', 'unique:organizations,slug'],
            'other_name' => ['nullable', 'json'],
            'abstract' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'founding_date' => ['nullable', 'date'],
            'dissolution_date' => ['nullable', 'date'],
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
        ];
    }
}
