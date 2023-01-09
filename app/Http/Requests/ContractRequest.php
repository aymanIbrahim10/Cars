<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'cus_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'state' => 'required',
            'details' => 'string|nullable',
            'driver_id' => 'nullable',
            'bank_id' => 'nullable',
            'bank_id' => 'nullable',
            'secret_code' => 'nullable|string|min:4|unique:contracts,secret_code,'.$this -> id,
            'account_number' => 'nullable|string|min:16|unique:contracts,account_number,'.$this -> id,
        ];
    }
}
