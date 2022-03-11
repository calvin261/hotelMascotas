<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required',
            'cedula' => 'required|numeric|digits:10',
            'fechaNacimiento' => 'required|date',
            'numeroCelular' => 'required|numeric|digits:10',
            'direccion' => 'required',
            'email' => 'required|email',
            'nombreMascota' => 'required',
            'edad' => 'numeric',
            'raza' => 'required',
            'categoria' => 'required|in:gato,perro'

        ];
    }
}
