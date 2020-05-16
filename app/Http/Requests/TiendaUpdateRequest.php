<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiendaUpdateRequest extends FormRequest
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
           'id' => 'required|string|unique:tiendas,id_tienda,'.$this->id_tienda,
           'nombre' => 'required|string',
           'fecha' =>  ['required','regex:/^([0-2][0-9]|(3)[0-1])(-)(((0)[0-9])|((1)[0-2]))(-)((?:2)\d{3})$/'],//se valida que la fecha sea en el formato dd-mm-aaaa ademas que la fecha sea mayor a 2000
        ];
    }
}
