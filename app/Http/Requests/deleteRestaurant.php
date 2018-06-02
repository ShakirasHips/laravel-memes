<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deleteRestaurant extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   	//restaurant rules
    public function rules()
    {
        return [
			'restaurant_id' => 'required|numeric',
        ];
    }

	//Restaurant messages
	public function messages()
	{
		return [
			'restaurant_id.required' => 'Please enter Restaurant ID',
			'restaurant_id.numeric' => 'Please enter a numeric restaurant id value',
		];
	}
}
