<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'address1' => 'required',
            'suburb' => 'required',
            'state' => 'required|max:3',
            'numberofseats' => 'required|numeric',
            'country_id' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name',
            'phone.required' => 'Please enter a phone number',
            'adddress1.required' => 'Please enter an address',
            'suburb.required' => 'Please enter a suburb',
            'state.required' => 'Pleae enter a state',
            'numberofseats.required' => 'Please enter number of seats',
        ];
}
}
