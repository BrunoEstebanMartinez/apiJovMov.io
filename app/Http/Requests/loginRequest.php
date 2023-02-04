<?php


namespace App\Http\Requests;

use Illuminate\Fundation\Http\FormRequest;


class loginRequest extends FormRequest{


    public function messages(){
        return [

            'correoFUR.required' => 'El correo no es el correcto.',
            'passwordFUR.required' => 'La contraseña no es la correcta',
            'isIfToInputs' => 'El correo y/o la contraseña son incorrectos',
            'isIfNotOnServer' => 'El usuario no existe'
        

        ];
    }

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
            'correoFUR' => 'required',
            'passwordFUR' => 'required'
        ];
    }


}