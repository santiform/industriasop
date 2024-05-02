<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetallesPuertaRequest extends FormRequest
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
			'id_tipo_funcionamiento' => 'required',
			'id_tipo_control' => 'required',
			'id_tipo_puerta' => 'required',
			'marca' => 'required|string',
			'voltaje' => 'required|string',
			'id_patin_retractil' => 'required',
        ];
    }
}
