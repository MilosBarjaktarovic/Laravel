<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Morate izabrati proizvod.',
            'product_id.exists' => 'Izabrani proizvod ne postoji.',
            'quantity.required' => 'Morate uneti količinu.',
            'quantity.integer' => 'Količina mora biti ceo broj.',
            'quantity.min' => 'Količina mora biti najmanje 1.',
        ];
    }
}
