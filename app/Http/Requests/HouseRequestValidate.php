<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequestValidate extends FormRequest
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
            'title' => 'required|min:3|max:30',
            'kindHouse' => 'required',
            'kindRoom' => 'required',
            'address' => 'required|min:5|max:255',
            'numBedroom' => 'required',
            'numBathroom' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'city_id' => 'required'
        ];
    }
}
