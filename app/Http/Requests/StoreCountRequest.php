<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountRequest extends FormRequest
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
            'group_id' => 'nullable|exists:groups,id',
            'vote_event_id' => 'nullable|exists:vote_events,id',
            'option' => 'nullable|string',
            'label' => 'nullable|string',
            'note' => 'nullable|string',
            'sources' => 'nullable|json',
            'links' => 'nullable|json',
            'external_id' => 'nullable|string',
            'source_system' => 'nullable|string',
        ];
    }
}
