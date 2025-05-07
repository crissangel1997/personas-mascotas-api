<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Puedes aplicar lógica de autorización si es necesario.
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
        'nombre' => 'required|string',
        'especie' => 'required|string',
        'raza' => 'nullable|string',
        'edad' => 'nullable|integer|min:0',
        'fecha_nacimiento' => 'nullable|date',
        'imagen' => 'nullable|url',
        'persona_id' => 'required|exists:personas,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la mascota es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'especie.required' => 'La especie es obligatoria.',
            'especie.string' => 'La especie debe ser perro o gato.',
            'raza.string' => 'La raza debe ser una cadena de texto válida.',
            'edad.required' => 'La edad de la mascota es obligatoria.',
            'edad.integer' => 'La edad debe ser un número entero.',
            'edad.min' => 'La edad debe ser cero o mayor.',
            'persona_id.required' => 'El ID de la persona es obligatorio.',
            'persona_id.exists' => 'La persona asociada no existe.',
        ];
    }

}
