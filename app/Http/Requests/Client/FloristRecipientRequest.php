<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class FloristRecipientRequest extends FormRequest
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
            'fullname'     => 'required',
            'email'         => 'string|email|unique:client_florist_recipient',
            'phone'         => 'required',
            'mobile'        => 'required',
            'gender'        => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'info_address'  => 'required',
            'address'       => 'required',
            'country_id'    => 'required',
            'province_id'   => 'required',
            'city_id'       => 'required',
            'district_id'   => 'required',
            'village_id'    => 'required',
            'zipcode_id'    => 'required',
            'client_affiliate_uuid' => 'required',
            'is_active'     => 'required',
        ];
    }
}
