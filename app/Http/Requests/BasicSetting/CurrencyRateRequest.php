<?php

namespace App\Http\Requests\BasicSetting;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRateRequest extends FormRequest
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
            'currency_code_from_id' => 'required',
            'currency_code_to_id' => 'required',
            'value' => 'required',
        ];
    }
}
