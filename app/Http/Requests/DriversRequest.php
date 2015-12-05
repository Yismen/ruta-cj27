<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DriversRequest extends Request
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
             'file_number'     =>  'required',
             'full_name'       =>  'required',
             // 'main_image'      =>  'required',
             'personal_id'     =>  'required',
             'dob'             =>  'required|date',
             'cellphone'       =>  'required',
             'phone'           =>  'required',
             'address'         =>  'required',
             'city'            =>  'required',
             'card_number'     =>  'required',
             'car_id'          =>  'required',
             'plate_number'    =>  'required',
             'reference'       =>  'required',
             'reference_phone' => 'required'
        ];
    }
}
