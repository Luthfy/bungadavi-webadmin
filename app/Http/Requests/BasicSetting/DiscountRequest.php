<?php

namespace App\Http\Requests\BasicSetting;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'promo_uuid' => 'required',
            'title' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'voucher_code' => 'required',
            'voucher_start_date' => 'required',
            'voucher_end_date' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required',
            'discount_max' => 'required',
            'minbill' => 'required',
            'action_by_guest' => 'required',
            'quota' => 'required',
            'payment_category' => 'required',
            'payment_type_id' => 'required',
            'is_active' => 'required',
            'tnc' => 'required',
            'tnc_en' => 'required',
        ];
    }
}
