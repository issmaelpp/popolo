<?php

namespace App\Http\Requests;

use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreResolutionRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:150'],
            'resolution_number' => ['required', 'string', 'max:10', 'unique:resolutions,resolution_number'],
            'seen' => ['nullable', 'string'],
            'considering' => ['nullable', 'string'],
            'resolution' => ['nullable', 'string'],
            'date' => ['nullable', 'date'],
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
        ];
    }
}
