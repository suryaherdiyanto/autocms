<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
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
            'title' => 'required|max:100',
            'slug' => 'required|unique:pages|max:100',
            'status' => 'required|in:draft,published,review',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|max:100',
            'meta_description' => 'nullable|max:120'
        ];
    }
}
