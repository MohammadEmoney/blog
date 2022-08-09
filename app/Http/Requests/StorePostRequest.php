<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string',
            'category_id' => 'nullable|integer|exists:categories,id',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string|in:draft,publish,private'
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'user_id' => Auth::id()
        ];
    }
}
