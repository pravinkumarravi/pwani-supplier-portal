<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:suppliers,email',
            'name' => 'required|string|max:50',
            'phone_number' => 'required|regex:/^[0-9]{7,15}$/',
            'phone_code' => 'required|string|max:4',
            'password' => 'required|min:6|max:15',
            'terms-and-policy' => 'accepted',
        ];
    }
}
