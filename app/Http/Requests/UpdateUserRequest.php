<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('id');

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => 'nullable|string|min:8',
            'permission_id' => 'required|exists:permissions,id',
            'birth_date' => 'nullable|date',
            'cpf' => 'nullable|string|max:14',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'cep' => 'nullable|string|max:9',
            'address' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'extra_info' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:2',
            'city' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'         => 'O nome é obrigatório2.',
            'name.string'           => 'O nome deve ser um texto.',
            'name.max'              => 'O nome não pode ter mais de 255 caracteres.',

            'email.required'        => 'O e-mail é obrigatório.2',
            'email.email'           => 'Informe um e-mail válido.',
            'email.unique'          => 'Esse e-mail já está em uso2.',

            'password.min'          => 'A senha deve ter no mínimo :min caracteres.',

            'permission_id.required'=> 'O tipo de cadastro é obrigatório.2',
            'permission_id.exists'  => 'Tipo de cadastro inválido.',

            'birth_date.date'       => 'Informe uma data de nascimento válida.',
            'cpf.max'               => 'O CPF deve ter no máximo 14 caracteres.',

            'photo.image'           => 'O arquivo deve ser uma imagem.',
            'photo.mimes'           => 'A foto deve estar no formato: jpg, jpeg ou png.',
            'photo.max'             => 'A foto deve ter no máximo 2MB.',

            'cep.max'               => 'O CEP deve ter no máximo 8 caracteres.',
            'number.max'            => 'O número deve ter no máximo 20 caracteres.',
            'state.max'             => 'O estado deve ter no máximo 2 caracteres.',
        ];
    }
}
