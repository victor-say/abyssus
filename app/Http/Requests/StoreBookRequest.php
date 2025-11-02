<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'author' => 'required|string|max:255|min:3', 
            'pages' => 'required|number',
            'publisher' => 'required|string', 
            'universe' => 'required|string', 
            'synopsis' => 'required|string', 
            'genero' => 'required|string', 
            'public' =>'required|string',
        ];
    }
}
