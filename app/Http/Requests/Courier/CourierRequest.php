<?php

namespace App\Http\Requests\Courier;

use Illuminate\Foundation\Http\FormRequest;

class CourierRequest extends FormRequest
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
            'username' => 'required|min:3|unique:couriers',
            'email' => 'string|email|unique:couriers',
            'password' => 'required|min:3',
            'fullname' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'DOB' => 'required',
            'marital_status' => 'required',
            'point' => 'required',
            'ktp' => 'required',
            'ktp_images' => 'required',
            'npwp' => 'required',
            'npwp_images' => 'required',
            'license_type' => 'required',
            'license_number' => 'required',
            'license_image' => 'required',
            'license_expired_date' => 'required',
            'address' => 'required',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'zipcode' => 'required',
            'join_date' => 'required',
            'end_date' => 'required',
            'contract_number' => 'required',
            'terminate_date' => 'required',
            'terminate_description' => 'required',
            'bank_name' => 'required',
            'bank_beneficiary_name' => 'required',
            'bank_account_number' => 'required',
            'bank_branch' => 'required',
            'photo' => 'required',
            'fcm' => 'required',
            'is_active' => 'required',
            'florist_uuid' => 'required',
        ];
    }
}
