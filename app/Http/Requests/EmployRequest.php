<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name,' . $this->id,
            'email' => 'required|string|unique:users,email,' . $this->id,
            'phone' => 'required|string|min:10|unique:users,phone,' . $this->id,
            'address' => 'required|string',
            'password' => 'required|string',
            'picture' => 'nullable|mimes:png,jpg,jpeg,svg',
        ];
    }
}
