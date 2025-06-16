<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNeighborhoodRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:80'],
            'full_name' => ['required', 'string', 'max:120', 'unique:neighborhoods,full_name'],
            'slug' => ['required', 'string', 'max:150', 'unique:neighborhoods,slug'],
            'coordinate' => ['nullable', 'json'],
        ];
    }
}
