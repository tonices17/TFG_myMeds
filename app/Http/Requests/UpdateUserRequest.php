<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $this->user->id
            ],
            'phone_number' => [
                'required',
                'min:9',
                'numeric',
                'unique:users,phone_number,' . $this->user->id
            ],
            'password' => [
                'nullable',
                'confirmed',
                'string',
                'min:8'
            ],
        ];
    }
}
