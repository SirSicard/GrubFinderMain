<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountyRequest extends FormRequest
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
            'name'=>$this->county == null ? 'unique:counties,name' : 'unique:counties,name,'
                .$this->county->id ,
            'slug' =>$this->county == null ? 'unique:counties,slug' : 'unique:counties,slug,'
                .$this->county->id,
            ];
    }
}
