<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'cus_nam' => 'required|max:255|unique:customers,cus_nam,'.$this -> id,
            'first_address' => 'required|string',
            'secund_address' => 'required|string',
            'license_num' => 'required|string|min:16|unique:customers,license_num,'.$this -> id,
            'phone_num' => 'required|string|min:10|unique:customers,phone_num,'.$this -> id,
            'place_of_issue' => 'required|string',
            'blood_group' => 'required|string',
            'date_of_issue' => 'required|date',
            'expire_date' => 'required|date',
            'type_lic' => 'required|string',
        ];

    }
    public function messages()
    {
        return [

            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل لايجب ان يكون من حروف',
            'unique' => 'عفوا اسم هذا الحقل موجود من قبل',
            'date' => 'هذا الحقل يجب ان يكون من نوع تاريخي',
            ];
    }
}
