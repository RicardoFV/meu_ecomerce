<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
    // criando as validaçoes 
    public function rules()
    {
        return [
            'ativo'=>'required',
            'imagem' => 'max:5000|image|mimes:jpeg',
            'descricao' => 'required|min:10|max:255',
            'quantidade' =>'required',
            'parceiro_id'=>'required',
            'preco' =>'required'
        ];
    }
    // colocando as mensagems em portugues 
    public function messages() {
        return [
            'parceiro_id.required' =>'O campo Parceiro é obrigatório',
            'preco.required' =>'O campo :attribute é obrigatório',
            'quantidade.required'=>'O campo :attribute é obrigatório', 
            'descricao.required'=>'O campo :attribute é obrigatório',
            'descricao.min'=>'O campo :attribute não permite menos de 10 digitos',
            'descricao.max'=>'O campo :attribute não permite mais de 255 digitos',
            'imagem.required'=>'O campo :attribute é obrigatório', 
            'imagem.max'=>'O campo :attribute não permite arquivos maiores que 5 Megas',
            'imagem.mimes'=>'O campo :attribute só permite arquivos no formato JPG e JPEG'
        ];
    }
}
