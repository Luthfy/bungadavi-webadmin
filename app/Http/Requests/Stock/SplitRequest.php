<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;

class SplitRequest extends FormRequest
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
            'stock_original_uuid' => 'required',
            'stock_fraction_name' => 'required',
            'unit_id' => 'required',
            'notes_stock_split' => 'nullable',
            'qty_stock_split' => 'required|min:1'
        ];
    }
}
