<?php

namespace App\Http\Requests\ProductControl;

use Illuminate\Foundation\Http\FormRequest;

class OpnameRequest extends FormRequest
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
            'qty_stock_opname'   => 'required|numeric',
            'notes_stock_opname' => 'nullable',
            'stocks_uuid'        => 'required',
        ];
    }
}
