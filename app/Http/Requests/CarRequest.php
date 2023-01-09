<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'car_name' => 'required|max:255|unique:cars,car_name,'.$this -> id,
            'model' => 'required|string',
            'plate_num' => 'required|string|unique:cars,plate_num,'.$this -> id,
            'engin_type' => 'required|max:255',
            'odo_meter' => 'required|max:255',
            'cost_of_day' => 'required|string',
            'price' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل لايجب ان يكون من حروف',
            'max' => 'هذا الحقل اطول من اللازم'
        ];
    }
}
