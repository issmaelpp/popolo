<?php

namespace App\Http\Requests;

use App\Enums\MembershipRoleEnum;
use App\Enums\MembershipStatusEnum;
use App\Enums\MembershipTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOrganizationPeopleRequest extends FormRequest
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
            'organization_id' => ['required', 'exists:organizations,id'],
            'person_id' => ['required', 'exists:people,id'],
            'role' => ['nullable', new Enum(MembershipRoleEnum::class)],
            'membership_status' => ['nullable', new Enum(MembershipStatusEnum::class)],
            'type' => ['nullable', new Enum(MembershipTypeEnum::class)],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'cessation_reason' => ['nullable', 'string'],
        ];
    }
}
