<?php

namespace App\Http\Requests;

class TestRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'answers' => 'required|array',
            'answers.*' => 'required|numeric|min:1|max:5'
        ];
    }

    public function messages(): array
    {
        return [
            'answers.required' => 'Marcar ao menos uma resposta é obrigatório!',
            'answers.*.required' => 'A nota é obrigatória!',
            'answers.*.min' => 'A nota deve ser maior ou igual à 1!',
            'answers.*.max' => 'A nota deve ser menor ou igual à 5!'
        ];
    }
}
