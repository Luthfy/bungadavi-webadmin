<?php

namespace App\Http\Requests\BasicSetting;

use Illuminate\Foundation\Http\FormRequest;

class OurBankRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'bank_name' => 'required',
            'bank_account_number' => 'required',
            'bank_beneficiary_name' => 'required',
            'bank_code' => 'required',
            'bank_branch' => 'required',
        ];
    }
}
