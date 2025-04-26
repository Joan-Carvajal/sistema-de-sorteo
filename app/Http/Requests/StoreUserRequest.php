<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|alpha',
            'apellido' => 'required|alpha',
            'cedula' => 'required|numeric|unique:users',
            'departamento_id' => 'required|exists:departamentos,id',
            'ciudad_id' => 'required|exists:ciudades,id',
            'celular' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'habeas' => 'required|accepted',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.alpha' => 'El nombre solo puede contener letras.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.alpha' => 'El apellido solo puede contener letras.',
            'cedula.required' => 'El campo cédula es obligatorio.',
            'cedula.numeric' => 'La cédula debe ser numérica.',
            'cedula.unique' => 'La cédula ya está registrada en el sistema.',
            'departamento_id.required' => 'El campo departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no existe.',
            'ciudad_id.required' => 'El campo ciudad es obligatorio.',
            'ciudad_id.exists' => 'La ciudad seleccionada no existe.',
            'celular.required' => 'El campo celular es obligatorio.',
            'celular.numeric' => 'El celular debe ser numérico.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'El correo electrónico ya está registrado en el sistema.',
            'habeas.required' => 'Debes aceptar la política de privacidad.',
            'habeas.accepted' => 'Debes aceptar los términos y condiciones.',
        ];
    }
}
