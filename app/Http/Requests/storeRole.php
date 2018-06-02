<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRole extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//comment rules
    public function rules()
    {
        return [
			'role_id' => 'required|numeric',
			'name' => 'required',
        ];
    }

	//comment messages
	public function messages()
	{
		return [
			'role_id.required' => 'Please enter id.',
			'role_id.numeric' => 'Please enter number id.',
			'name.required' => 'Please enter name.',
		];
	}
}
