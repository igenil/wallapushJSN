<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnunciosEditRequest extends FormRequest
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
            'producto' => 'required|string|max:100',
            'descripcion' => 'required|string|max:100',
            'id_categoria' => 'required',
            'precio' => 'required|min:1',
            'nuevo' => 'required',
            'vendido' => 'required',
        ];
    }
}
