<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::check();
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Defino las reglas para el formulario de HTML
        return [
            //
            'name'=> 'required',
            'email'=> 'required',
            'role_id'=> 'required',
            'is_active'=> 'required',
            'password'=> 'required'
        ];
    }
}
