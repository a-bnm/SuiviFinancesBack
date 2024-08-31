<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnvieRequest extends FormRequest
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
            'desigantion' => 'required|string',
            'cout' => 'required|numeric',
            'cout_rassemble' => 'required|numeric',
            'cout_restant' => 'required|numeric',
            'user_id' => 'required',
            'description' => 'required|string|min:10',
        ];
    }
}