<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product'                  => 'required',
            'short_description_product'     => 'nullable',
            'short_description_en_product'  => 'nullable',
            'description_product'           => 'nullable',
            'description_en_product'        => 'nullable',
            'currency_uuid'                 => 'nullable',
            'cost_product'                  => 'nullable',
            'florist_cost_product'          => 'nullable',
            'selling_price_product'         => 'nullable',
            'selling_florist_price_product' => 'nullable',
            'status_product'                => 'nullable',
            'mostwanted_product'            => 'nullable',
            'popularity_product'            => 'nullable',
            'seen_product'                  => 'nullable',
            'image_main_product'            => 'nullable',
            'images_product'                => 'nullable',
            'as_addon_product'              => 'nullable',
            'minimum_order_product'         => 'nullable',
            'printcmmode_product'           => 'nullable',
            'user_uuid'                     => 'nullable',
        ];
    }
}
