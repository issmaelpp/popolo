<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotionRequest extends FormRequest
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
            'group_id' => ['nullable', 'exists:groups,id'],
            'vote_event_id' => ['nullable', 'exists:vote_events,id'],
            'text' => ['nullable', 'string'],
            'identifier' => ['required', 'string', 'max:255', 'unique:motions,identifier'],
            'title' => ['nullable', 'string', 'max:255'],
            'classification' => ['required', 'string', 'max:40'],
            'legislative_session_id' => ['nullable', 'string'],
            'datetime' => ['required', 'date'],
            'requirement' => ['nullable', 'string', 'max:40'],
            'result' => ['nullable', 'string', 'max:40'],
            'purpose' => ['nullable', 'string'],
            'summary' => ['nullable', 'string'],
            'sources' => ['nullable', 'json'],
            'links' => ['nullable', 'json'],
            'attachments' => ['nullable', 'json'],
            'external_id' => ['nullable', 'string'],
            'source_system' => ['nullable', 'string'],
        ];
    }
}
