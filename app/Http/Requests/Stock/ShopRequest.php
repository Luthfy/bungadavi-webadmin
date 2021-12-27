<?php

namespace App\Http\Requests\Stock;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'total_price_stock_shop' => 'required|numeric',
            'qty_stock_shop'         => 'required|numeric',
            'reject_stock_shop'      => 'nullable|numeric',
            'notes_stock_shop'       => 'nullable',
            'stocks_uuid'            => 'required'
        ];
    }
}
