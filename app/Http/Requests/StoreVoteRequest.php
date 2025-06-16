<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoteRequest extends FormRequest
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
            'vote_event_id' => ['required', 'exists:vote_events,id'],
            'person_id' => ['required', 'exists:people,id'],
            'option' => ['required', 'string'],
            'group_id' => ['nullable', 'exists:groups,id'],
            'weight' => ['nullable', 'numeric'],
            'pair_id' => ['nullable', 'exists:people,id'],
            'role' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
        ];
    }
}
