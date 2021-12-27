<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'name_stock'    => 'required|string',
            'type_stock'    => 'required',
            'qty_stock'     => 'required|numeric',
            'image_stock'   => 'file|image',
            'unit_id'       => 'required',
        ];
    }
}
