<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\GeneralStatusEnum;
use Illuminate\Validation\Rules\Enum;

class StoreCivilRequestRequest extends FormRequest
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
            'person_id' => 'required|exists:people,id',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
        ];
    }
}
