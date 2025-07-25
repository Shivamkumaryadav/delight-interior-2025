<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFilmRequest extends FormRequest
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
            'name' => 'required|min:3|unique:films,name',
            'description' => 'required',
            'uv_rejection' => 'required|numeric',
            'thickness' => 'required|numeric',
            'warranty' => 'required|numeric',
            'price' => 'required|numeric',
            'category' => 'required'
            // 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
