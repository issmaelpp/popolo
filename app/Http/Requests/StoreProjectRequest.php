<?php

namespace App\Http\Requests;

use App\Enums\GeneralStatusEnum;
use App\Enums\ProjectTypeEnum;
use App\Enums\TypeOfWorkEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug'],
            'description' => ['required', 'string'],
            'status' => ['required', 'string', 'enum:' . GeneralStatusEnum::class],
            'project_type' => ['nullable', 'string', 'enum:' . ProjectTypeEnum::class],
            'type_of_work' => ['nullable', 'string', 'enum:' . TypeOfWorkEnum::class],
            'coordinate' => ['nullable', 'json'],
            'localization' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'available' => ['nullable', 'boolean'],
        ];
    }
}
