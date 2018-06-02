<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//comment rules
    public function rules()
    {
        return [
			'category_id' => 'required|numeric',
			'name' => 'required',
        ];
    }

	//comment messages
	public function messages()
	{
		return [
			'category_id.required' => 'Please enter id.',
			'category_id.numeric' => 'Please enter number id.',
			'name.required' => 'Please enter name.',
		];
	}
}
