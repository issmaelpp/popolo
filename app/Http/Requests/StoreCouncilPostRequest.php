<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\GeneralStatusEnum;
use Illuminate\Validation\Rules\Enum;

class StoreCouncilPostRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'type' => 'nullable|string',
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
            'url' => 'nullable|string|max:255',
            'source_url' => 'nullable|string|max:255',
            'metadata' => 'nullable|json',
            'external_id' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ];
    }
}
