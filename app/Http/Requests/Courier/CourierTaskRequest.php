<?php

namespace App\Http\Requests\Courier;

use Illuminate\Foundation\Http\FormRequest;

class CourierTaskRequest extends FormRequest
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
            'order_transaction_uuid' => 'required',
            'delivery_schedule_uuid' => 'required',
            'user_uuid' => 'required',
            'courier_uuid' => 'required',
            'delivery_number_assignment' => 'required',
            'status_assignment' => 'required',
            'notes_assignment' => 'required',
            'browse_image' => 'required',
            'image_pickup' => 'required',
        ];
    }
}
