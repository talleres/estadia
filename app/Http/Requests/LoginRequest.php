<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'usuario' => 'required',
            'password'   => 'required'
        ];
    }

    public function messages(){
        return [
            'usuario.required'  => 'El campo usuario es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio'
        ];
    }
}
