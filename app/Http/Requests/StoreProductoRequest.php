<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categorias,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'price.required' => 'El campo precio es requerido',
            'category_id.exists' => 'La categoría seleccionada no existe',
        ];
    }
}
