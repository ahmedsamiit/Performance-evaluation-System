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
<<<<<<< HEAD
                'supervisor'=>'integer|nullable',
=======

                'name'=>'min:3|max:50|nullable',
                'email'=>"email|unique:users,email,{$this->user}|nullable",
                'hiring-date'=>'date|nullable',
                'supervisor'=>'integer',
                'avatar'=>'nullable',
>>>>>>> 018a30f6cd6ed0d498a569e1cca6a2bfd9beb91e
                'role_id'=>'integer',
        ];
    }
}
