<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoringUser extends FormRequest
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
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|unique:users',
            'avatar'=>'required',
            'hiring-date'=>'required|date',
            'supervisor'=>'required|integer',
            'password'=>'required|min:6'
        ];
    }
}