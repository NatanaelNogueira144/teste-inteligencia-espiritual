<?php

namespace App\Http\Requests;

class UpdateLevelRequest extends BaseRequest
{
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'name' => 'required|max:20'
            ];
        } else {
            return [
                'name' => 'sometimes|required|max:20'
            ];
        }
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 20 caracteres!'
        ];
    }
}
