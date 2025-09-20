<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3|unique:users,email',
            'password' => 'required|min:8|max:16',
            'role' => 'required'
        ];

        if($this->isMethod('PUT') || $this->isMethod('PATCH'))
        {
            $rules['email'] = 'required|min:3|unique:users,email,' . $this->route('user')->id;
            $rules['password'] = 'nullable';
        }
        return $rules;
    }
}
