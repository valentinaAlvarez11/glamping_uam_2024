<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CabinStoreRequest extends FormRequest
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
            'name' => 'required|min:5|max:40|string|unique:cabins,name',
            'cabinlevel_id' => 'required|integer|numeric',
            'capacity' => 'required|integer|numeric|min:1',
        ];
    }
}
