<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioRequest extends FormRequest
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
            'producto'=> 'required',
            'id_categoria'=>'required',
            'precio' => 'min:1',
            'estado' => 'required',
            'descripcion' => 'required',
            
        ];
    }
}