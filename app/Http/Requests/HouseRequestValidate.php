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
            'title' => 'required|min:3|max:50',
            'kindHouse' => 'required',
            'kindRoom' => 'required',
            'address' => 'required|min:5|max:255',
            'numBedroom' => 'required|between:1,2|alpha_num',
            'numBathroom' => 'required|between:1,2|alpha_num',
            'description' => 'required|min:20',
            'price' => 'required|min:1',
            'city_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'*Title Invalid',
            'title.min'=>'*Title too short',
            'title.max'=>'*Title too long',
            'kindHouse.required'=>'*Kind house invalid',
            'kindRoom.required'=>'*Kind house invalid',
            'address.required'=>'*Address invalid',
            'address.min'=>'*Address too short',
            'address.max'=>'*Address too long',
            'numBedroom.required'=>'*Bedroom invalid',
            'numBathroom.required'=>'*Bathroom invalid',
            'price.required'=>'*Price invalid',
            'city_id.required'=>'*City invalid',
        ];
    }
}
