<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiposControleRequest extends FormRequest
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
			'id_tipo_funcionamiento' => 'required',
			'nombre' => 'required|string',
			'marca' => 'required|string',
			'voltaje' => 'required|string',
			'potencia' => 'required|string',
			'encoder' => 'required|string',
			'rescate' => 'required',
        ];
    }
}
