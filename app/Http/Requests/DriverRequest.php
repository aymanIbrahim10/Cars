<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'driver_nam' => 'required|max:255|unique:drivers,driver_nam,'.$this -> id,
            'driver_first_address' => 'required|string',
            'driver_secund_address' => 'required|string',
            'license_num' => 'required|string|max:255|unique:customers,license_num,'.$this -> id,
            'phone_num' => 'required|string|min:10|unique:customers,phone_num,'.$this -> id,
            'place_of_issue' => 'required|string',
            'blood_group' => 'required|string',
            'date_of_issue' => 'required|date',
            'expire_date' => 'required|date',
            'type_lic' => 'required|string',
            'nationality' => 'required|string',

        ];

    }
}
