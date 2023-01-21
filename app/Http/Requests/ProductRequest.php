<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:105'],
            'description' => ['required', 'max:600'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0','max:999'],
            'status' => ['required', 'in:available,unavailable'],
            //
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if ($this->status == 'available' && $this->stock == 0 ){
                $validator->errors()->add('stock', 'If available must have stock');
            }
        });
    }
}
