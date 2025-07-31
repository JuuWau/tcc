<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'permission_id' => 'required|exists:permissions,id',
            'birth_date' => 'nullable|date',
            'cpf' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cep' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'extra_info' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:2',
            'city' => 'nullable|string|max:255',
        ];
    }
    
    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'O nome é obrigatório.',
            'name.string'           => 'O nome deve ser um texto.',
            'name.max'              => 'O nome não pode ter mais de 255 caracteres.',

            'email.required'        => 'O e-mail é obrigatório.',
            'email.email'           => 'Informe um e-mail válido.',
            'email.unique'          => 'Esse e-mail já está em uso.',

            'password.required'     => 'A senha é obrigatória.',
            'password.min'          => 'A senha deve ter no mínimo :min caracteres.',

            'permission_id.required'=> 'O tipo de cadastro é obrigatório.',

            'birth_date.date'       => 'Informe uma data de nascimento válida.',

            'cpf.string'            => 'O CPF deve ser um texto válido.',

            'photo.image'           => 'O arquivo deve ser uma imagem.',
            'photo.mimes'           => 'A foto deve estar no formato: jpg, jpeg ou png.',
            'photo.max'             => 'A foto deve ter no máximo 2MB.',
        ];
    }
}
