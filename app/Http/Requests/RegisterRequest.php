<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    #[ArrayShape(
        [
            'username' => "string",
            'email' => "string",
            'password' => "string",
            'password_confirm' => "string"
        ]
    )]
    public function rules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|email:rfc,dns|unique:user,email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
        ];
    }
}
