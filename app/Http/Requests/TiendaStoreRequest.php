<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiendaStoreRequest extends FormRequest
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
            'id' => 'required|string|unique:tiendas',
           'nombre' => 'required',//,'regex:/^\d+$/'
           'fecha' => ['required','regex:^(?:3[01]|[12][0-9]|0?[1-9])([-])(0?[1-9]|1[1-2])\1\d{4}$^'],
        ];
    }
}
