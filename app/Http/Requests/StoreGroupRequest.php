<?php

namespace App\Http\Requests;

use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreGroupRequest extends FormRequest
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
            'label' => ['required', 'string', 'max:255', 'unique:groups,label'],
            'description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
        ];
    }
}
