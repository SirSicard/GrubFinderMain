<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationsRequest extends FormRequest
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
            'name'=>$this->location == null ? 'unique:locations,name' : 'unique:locations,name,'
                .$this->location->id ,
            'slug' =>$this->location == null ? 'unique:locations,slug' : 'unique:locations,slug,'
                .$this->location->id,
        ];
    }
}
