<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRecipientRequest extends FormRequest
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
                'firstname'     => 'required',
                'lastname'      => 'required',
                'email'         => 'string|email|unique:client_personal_recipient',
                'phone'         => 'required',
                'mobile'        => 'required',
                'gender'        => 'required',
                'birthday'      => 'required|date',
                'latitude'      => 'required',
                'longitude'     => 'required',
                'address'       => 'required',
                'country_id'    => 'required',
                'province_id'   => 'required',
                'city_id'       => 'required',
                'district_id'   => 'required',
                'village_id'    => 'required',
                'zipcode_id'    => 'required',
                'client_personal_uuid'    => 'required',
                'is_active'     => 'required',
            ];
    }
}
