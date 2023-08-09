<?php

namespace Modules\Authentication\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Modules\Authentication\Rules\RealEmailValidator;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('users', 'email'),
                new RealEmailValidator,
            ],
            'password' => ['required', Password::default()],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
