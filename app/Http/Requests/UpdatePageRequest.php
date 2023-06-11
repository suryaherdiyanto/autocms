<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'slug' => 'nullable|unique:pages|string|max:100',
            'content' => 'nullable|string',
            'is_published' => 'required|boolean',
            'meta_title' => 'nullable|string|max:100',
            'meta_description' => 'nullable|string'
        ];
    }
}
