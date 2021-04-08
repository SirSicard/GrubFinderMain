<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantsRequest extends FormRequest
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
            //
            'name'=> 'required|unique:restaurants',
            'slug' =>'unique:restaurants',
            'address' => 'required',
            'phone' => 'required',
//            'gmap' => 'required',
            'status_id' => 'required'

        ];
    }
}
