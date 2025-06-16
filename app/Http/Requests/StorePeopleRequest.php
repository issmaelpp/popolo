<?php

namespace App\Http\Requests;

use App\Enums\GenderEnum;
use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StorePeopleRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'family_name' => ['required', 'string', 'max:60'],
            'given_name' => ['required', 'string', 'max:60'],
            'additional_name' => ['nullable', 'string', 'max:60'],
            'other_name' => ['nullable', 'json'],
            'honorific_prefix' => ['nullable', 'string', 'max:10'],
            'gender' => ['nullable', 'string', 'enum:' . GenderEnum::class],
            'birth_date' => ['nullable', 'date'],
            'death_date' => ['nullable', 'date'],
            'summary' => ['nullable', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            'status' => ['required', 'string', 'enum:' . GeneralStatusEnum::class],
        ];
    }
}
