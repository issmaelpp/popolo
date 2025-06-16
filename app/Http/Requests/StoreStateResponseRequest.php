<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateResponseRequest extends FormRequest
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
            'civil_request_id' => ['required', 'exists:civil_requests,id'],
            'organization_id' => ['required', 'exists:organizations,id'],
            'person_id' => ['required', 'exists:people,id'],
            'response' => ['nullable', 'string'],
            'responded_at' => ['nullable', 'date'],
        ];
    }
}
