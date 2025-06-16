<?php

namespace App\Http\Requests;

use App\Enums\TrafficLineTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreTrafficLineRequest extends FormRequest
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
            'traffic_line_type' => ['required', new Enum(TrafficLineTypeEnum::class)],
            'name' => ['required', 'string', 'max:80'],
            'coordinate' => ['nullable', 'json'],
        ];
    }
}
