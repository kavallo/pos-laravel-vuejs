<?php

namespace App\Http\Requests;

use App\Rules\ValidPassword;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|max:100',
            'email'        => 'required|email|unique:admins,email,'.auth()->user()->id,
            'old_password' => ['nullable', Rule::requiredIf($this->filled('new_password')), new ValidPassword],
            'new_password' => ['nullable', Rule::requiredIf($this->filled('old_password')), 'min:8', 'confirmed'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
