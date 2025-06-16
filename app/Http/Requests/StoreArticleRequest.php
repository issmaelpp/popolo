<?php

namespace App\Http\Requests;

use App\Enums\ArticleTypeEnum;
use App\Enums\GeneralStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreArticleRequest extends FormRequest
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
            'type' => ['required', new Enum(ArticleTypeEnum::class)],
            'slug' => 'required|string|max:200|unique:articles,slug',
            'title' => 'required|string|max:160',
            'lead' => 'nullable|string|max:500',
            'image' => 'required|string|max:255',
            'body' => 'nullable|string',
            'status' => ['required', new Enum(GeneralStatusEnum::class)],
            'published_at' => 'nullable|date',
            'organizations' => 'nullable|array',
            'organizations.*' => 'exists:organizations,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
