<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
             // que tipo de informações serão validados
            'ativo' => 'required',
            'nome' => 'required|min:3|max:255',
            'email' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'complemento' => 'required',
            'uf' => 'required',
            'data_nascimento' => 'required',
            'cpf' => 'required',
            'telefone' => 'required|min:10|max:11',
            'celular' => 'required|min:10'
        ];
    }
    
    public function messages() {
        return[
            // mensagens em português
            'nome.required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo :attribute não permite menos de 3 caracteres',
            'nome.max' => 'O campo :attribute não permite mais de 255 caracteres',
            'email.required' => 'O campo :attribute é obrigatório',
            'data_nascimento.required' => 'O campo :attribute é obrigatório',
            'cpf.required' => 'O campo :attribute é obrigatório',
            'cep.required' => 'O campo :attribute é obrigatório',
            'logradouro.required' => 'O campo :attribute é obrigatório',
            'bairro.required' => 'O campo :attribute é obrigatório',
            'complemento.required' => 'O campo :attribute é obrigatório',
            'localidade.required' => 'O campo :attribute é obrigatório',
            'uf.required' => 'O campo :attribute é obrigatório',
            'telefone.required' => 'O campo :attribute é obrigatório',
            'telefone.min' => 'O campo :attribute não permite menos de 10 caracteres',
            'telefone.max' => 'O campo :attribute não permite mais de 11 caracteres',
            'celular.required' => 'O campo :attribute é obrigatório',
            'celular.min' => 'O campo :attribute não permite menos de 10 caracteres',
        ];
    }
}
