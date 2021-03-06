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
            'city_id' => 'required',
            'district_id' =>'required',
            'images' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Title Invalid',
            'title.min'=>'Title too short',
            'title.max'=>'Title too long',
            'kindHouse.required'=>'Kind house invalid',
            'kindRoom.required'=>'Kind room invalid',
            'address.required'=>'Address invalid',
            'address.min'=>'Address too short',
            'address.max'=>'Address too long',
            'numBedroom.required'=>'Bedroom invalid',
            'numBedroom.between:1,2'=>'kudhfdhfknjn',
            'numBathroom.required'=>'Bathroom invalid',
            'price.required'=>'Price invalid',
            'city_id.required'=>'City invalid',
            'district_id.required'=>'District invalid',
            'images.required'=>'Images invalid',
        ];
    }
}
