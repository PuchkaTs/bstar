<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAdsRequest extends Request
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
            'adstag' => 'required',
            'location' => 'required',
            'age' => 'required',
            'price' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'gender' => 'required',
        ];
    }
}
