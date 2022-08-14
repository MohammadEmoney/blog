<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'. $this->user()->id,
            'password' => 'nullable|password_confirmation',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
        return array_filter($data);
    }
}
