<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProductRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            $request->validate([
                'name' => 'bail|required|max:255',
                'catelogue_id' => 'required',
                'is_active' => 'required',
                'number' => 'required',
                'price_regular' => 'required',
            ])
        ];
    }
    public function  messages()
    {
     
        return [
            'name.required' => 'A title is required',
            'number.required' => 'A message is required',
        ];
    }
    public function  attributes()  {
        
    }
}
