<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
           'nom' => 'required|unique:categories|',

         ];
     }

     public function messages()
     {
         return [
             'nom.required' => 'vous devez saisir ce champs ',
             'nom.unique' => 'vous avez déja ajouter cette categorie ',




         ];
     }
}
