<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetallesGeneraleRequest extends FormRequest
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
			'id_pedido' => 'required',
			'placa_cabina' => 'required',
			'indicador_cabina' => 'required',
			'indicador_pb' => 'required',
			'indicador_palier' => 'required',
        ];
    }
}
