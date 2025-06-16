<?php

namespace App\Http\Requests;

use App\Enums\DimensionMeasureEnum;
use App\Enums\DimensionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreDimensionRequest extends FormRequest
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
            'international_classification_id' => ['nullable', 'exists:international_classifications,id'],
            'cultural_cycle_id' => ['nullable', 'exists:cultural_cycles,id'],
            'domain_id' => ['nullable', 'exists:domains,id'],
            'subdomain_id' => ['nullable', 'exists:subdomains,id'],
            'code' => ['nullable', 'string', 'max:15'],
            'note' => ['nullable', 'string'],
            'label' => ['required', 'string', 'max:600'],
            'measure' => ['nullable', new Enum(DimensionMeasureEnum::class)],
            'type' => ['nullable', new Enum(DimensionTypeEnum::class)],
        ];
    }
}
