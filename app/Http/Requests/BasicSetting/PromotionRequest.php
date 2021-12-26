<?php

namespace App\Http\Requests\BasicSetting;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'title' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'tnc' => 'required',
            'tnc_en' => 'required',
            'promotion_code' => 'required',
            'promo_start_date' => 'required',
            'promo_end_date' => 'required',
            'is_active' => 'required',
        ];
    }
}
