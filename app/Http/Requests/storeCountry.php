<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCountry extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//comment rules
    public function rules()
    {
        return [
			'country_id' => 'required|numeric',
			'name' => 'required',
        ];
    }

	//comment messages
	public function messages()
	{
		return [
			'country_id.required' => 'Please enter id.',
			'country_id.numeric' => 'Please enter number id.',
			'name.required' => 'Please enter name.',
		];
	}
}
