<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoteEventRequest extends FormRequest
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
            'organization_id' => ['nullable', 'exists:organizations,id'],
            'identifier' => ['required', 'string', 'max:255', 'unique:vote_events,identifier'],
            'label' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'start_datetime' => ['nullable', 'date'],
            'end_datetime' => ['nullable', 'date', 'after_or_equal:start_datetime'],
            'result' => ['nullable', 'string'],
            'group_results' => ['nullable', 'json'],
            'vote_method' => ['nullable', 'string'],
            'yes_count' => ['nullable', 'integer', 'min:0'],
            'no_count' => ['nullable', 'integer', 'min:0'],
            'abstain_count' => ['nullable', 'integer', 'min:0'],
            'absent_count' => ['nullable', 'integer', 'min:0'],
            'not_voting_count' => ['nullable', 'integer', 'min:0'],
            'requirement' => ['nullable', 'string'],
            'required_votes' => ['nullable', 'integer', 'min:0'],
            'legislative_session_id' => ['nullable', 'string'],
            'chamber' => ['nullable', 'string'],
            'vote_number' => ['nullable', 'integer'],
            'status' => ['nullable', 'string'],
            'sources' => ['nullable', 'json'],
            'links' => ['nullable', 'json'],
            'note' => ['nullable', 'string'],
            'external_id' => ['nullable', 'string'],
            'source_system' => ['nullable', 'string'],
        ];
    }
}
