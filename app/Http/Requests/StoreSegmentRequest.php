<?php

namespace App\Http\Requests;

use App\Enums\OrientationEnum;
use App\Enums\SurfaceTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreSegmentRequest extends FormRequest
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
            'traffic_line_id' => ['required', 'exists:traffic_lines,id'],
            'surface_type' => ['nullable', new Enum(SurfaceTypeEnum::class)],
            'orientation' => ['nullable', new Enum(OrientationEnum::class)],
            'coordinate' => ['nullable', 'json'],
        ];
    }
}
