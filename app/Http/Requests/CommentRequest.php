<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content'=>'required',
            'post_id'=>'required|numeric',
            'user_id'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'The content section cant be empty',

        ];
    }
}
