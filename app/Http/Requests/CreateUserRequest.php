<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'nombre'   => 'required',
            'usuario'  => 'required',
            'email'    => 'required|email|unique:usuarios, email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio',
            'email'    => 'Escriba un correo electrónico válido',
            'unique'   => 'Este correo electrónico ya ha sido registrado',
        ];
    }
}
