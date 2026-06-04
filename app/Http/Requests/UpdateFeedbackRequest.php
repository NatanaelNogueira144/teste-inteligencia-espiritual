<?php

namespace App\Http\Requests;

class UpdateFeedbackRequest extends BaseRequest
{
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'description' => 'required|max:1000'
            ];
        } else {
            return [
                'description' => 'sometimes|required|max:1000'
            ];
        }
    }

    public function messages(): array 
    {
        return [
            'description.required' => 'A descrição é obrigatória!',
            'description.max' => 'A descrição deve ter no máximo 1000 caracteres!'
        ];
    }
}
