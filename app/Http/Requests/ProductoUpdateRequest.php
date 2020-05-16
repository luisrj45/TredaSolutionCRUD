<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
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
            'sku' => ['required','string','unique:productos,id,'.$this->id],
           'nombre' => ['required','string'],
           'descripcion' => ['required','string'],
           'tienda' => ['required','exists:tiendas,id_tienda'], 
           //'imagen' => ['image','mimes:jpeg,png,jpg'],//valida que es obligatorio y la imagen sea en los formatos jpeg, png y jpg
           'valor' => ['required','regex:/^\d+$/'],//se valida que la valor sea solo digitos
        ];
    }
}
