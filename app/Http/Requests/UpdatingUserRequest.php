<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatingUserRequest extends FormRequest
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

                'name'=>'min:3|max:50',
                'email'=>'email|unique:users',
                'hiring-date'=>'date',
                'supervisor'=>'integer',
                'avatar'=>'nullable',
                'role_id'=>'integer',


        ];
    }
}
