<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClienteRequest extends FormRequest
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
            //Datos de validacion
            //'cod_cliente' => 'required|min:1|max:100',
            //'dpi_cliente' => 'required|unique:clientes,dpi_cliente',
            //'dire_cliente' => 'required|min:1|max:200' ,
        ];
    }
}
