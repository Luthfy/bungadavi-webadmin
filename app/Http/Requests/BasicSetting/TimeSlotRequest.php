<?php

namespace App\Http\Requests\BasicSetting;

use Illuminate\Foundation\Http\FormRequest;

class TimeSlotRequest extends FormRequest
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
            'time_slot_name' => 'required',
            'time_from' => 'required',
            'price' => 'required',
            'description' => 'required',
            'is_priority'=>'required',
            'is_active' => 'required',
        ];
    }
}
