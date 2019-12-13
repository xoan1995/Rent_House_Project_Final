<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'max:50',
            'dob' => 'nullable',
            'idCard' => 'nullable|regex:/[1-9]{9}/|max:9',
            'gender' => 'nullable|string|',
            'address' => 'nullable|string|max:255',
            'phone' => "nullable|regex:/[0-9]{9}/|max:10|",
        ];
    }
}
