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
        return false;
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
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
            'image_4' => 'required',
            'address' => 'required|min:5|max:255',
            'kindHouse' => 'required',
            'kindRoom' => 'required',
            'numBedroom' => 'required',
            'numBathroom' => 'required',
            'description' => 'required|min:20',
            'price' => 'required',
            'city_id' => 'required'
        ];
    }
}
