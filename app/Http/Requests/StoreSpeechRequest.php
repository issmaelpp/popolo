<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpeechRequest extends FormRequest
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
            'creator_id' => ['required', 'exists:people,id'],
            'role' => ['nullable', 'string', 'max:40'],
            'attribution_text' => ['nullable', 'string', 'max:255'],
            'text' => ['nullable', 'string'],
            'audio' => ['nullable', 'string', 'max:255'],
            'video' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'title' => ['nullable', 'string', 'max:250'],
            'type' => ['nullable', 'string', 'max:40'],
            'position' => ['nullable', 'integer'],
            'event_id' => ['nullable', 'string', 'max:255'],
            'section' => ['nullable', 'string'],
            'sources' => ['nullable', 'json'],
            'links' => ['nullable', 'json'],
            'external_id' => ['nullable', 'string'],
            'source_system' => ['nullable', 'string'],
        ];
    }
}
