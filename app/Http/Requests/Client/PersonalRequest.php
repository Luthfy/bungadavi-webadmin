<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
            'fullname'      => 'required',
            'firstname'     => 'required',
            'lastname'      => 'required',
            'phone'         => 'required',
            'mobile'        => 'required',
            'gender'        => 'required',
            'birthday'      => 'required|date',
            'address'       => 'required',
            'country_id'    => 'required',
            'province_id'   => 'required',
            'city_id'       => 'required',
            'district_id'   => 'required',
            'village_id'    => 'required',
            'zipcode_id'    => 'required',
            'refferal'      => 'string',
            'sharelink'     => 'string',
            'email'         => 'string|email|unique:client_personal',
            'username'      => 'required|min:3|unique:client_personal',
            'password'      => 'required|min:3',
        ];
    }
}
