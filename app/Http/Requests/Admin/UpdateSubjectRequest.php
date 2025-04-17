<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'close_relative' => 'required|string|min:2|max:255',
            'close_relative_degree' => 'required|string|in:mother,father,relative,friend',
            'birthdate' => 'nullable|date',
            'cpf' => 'nullable|string|min:11|max:15',
            'rg' => 'nullable|string|min:2|max:20',
            'birthplace' => 'nullable|string|min:2|max:255',
            'address' => 'nullable|string|min:2|max:255',
            'religion' => 'nullable|string|min:2|max:255',
            'color' => 'nullable|string|in: ,preto,pardo,indigeno,branco,amarelo',
            'income' => 'nullable|string|in: ,zero,2900,7100,22000,superior',
            'chemical_dependency' => 'nullable|string|min:2|max:255',
            'crime_article' => 'nullable|string|min:2|max:255',
            'crime_status' => 'nullable|string|min:2|max:255',
            'family_telephone' => 'nullable|string|min:2|max:20',
            'family_address' => 'nullable|string|min:2|max:255',
        ];
    }
}
