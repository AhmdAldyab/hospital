<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNurse extends FormRequest
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'email'=>'required|email',
            'number_phone'=>'required',
            'date_hiring'=>'required|date',
            'specialization_id'=>'required|integer',
            'gender_id'=>'required | integer',
            'adrees'=>'required',
        ];
    }
}
