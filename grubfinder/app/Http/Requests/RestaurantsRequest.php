<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
//        dd($this->restaurant);
        return [
            //
            'name'=>$this->restaurant == null ? 'unique:restaurants,name' : 'unique:restaurants,name,'
                .$this->restaurant->id ,
            'slug' =>$this->restaurant == null ? 'unique:restaurants,slug' : 'unique:restaurants,slug,'
                .$this->restaurant->id,
            'address' => 'required',
            'phone' => 'required',
//            'gmap' => 'required',
            //'status_id' => 'required'

        ];
    }
}
