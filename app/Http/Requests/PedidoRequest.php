<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
			'id_tipo_obra' => 'required',
			'id_tipo_funcionamiento' => 'required',
			'id_tipo_control' => 'required',
			'id_tipo_puerta' => 'required',
			'id_acceso' => 'required',
			'nombre' => 'required|string',
			'email' => 'required|string',
			'telefono' => 'required|string',
			'direccion_obra' => 'required|string',
        ];
    }
}
