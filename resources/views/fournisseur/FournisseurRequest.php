<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
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
            'nom' => 'required|max:25',
            'email' => 'required|unique:fournisseurs|email',
            'telephone' => 'required|unique:fournisseurs',
            'fax' => 'max:25',
            'ville' => 'required|alpha|max:15',
            'adresse1' => 'required|max:100',
            'adresse2' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'vous devez saisir le nom ',
            'nom.max' => ' le nom peut contenir 25 caractères au maximum ',
            'email.email' => 'cela ne ressemble pas au format email',
            'email.required' => 'le champs email et oubligatoire',
            'email.unique' => 'ce mail est déjà  pris',
            'telephone.required' => 'le téléphone est obligé! saisir le téléphone',
            'telephone.unique' => 'ce numéro est déjà  pris',
            'telephone.numeric' => 'le téléphone ne peut contenir que des numéros',
            //'fax.unique' => 'ce fax a été déjà  pris',
            'fax.max' => 'le fax ne peut contenir que 25 caractères',
            //'fax.string' => 'le fax ne peut contenir que des numéros et caractères',
            'ville.required' => 'la ville  est obligé! saisir une ville',
            'ville.alpha' => 'la ville ne peut contenir que des caractères',
            'ville.max' => 'la ville ne peut contenir que 15 caractères',
            'adresse1.required' => 'adresse est obligé! saisir une adresse ',
            'adresse1.max' => 'adresse ne peut contenir que 100 caractères',
            'adresse2.max' => 'adresse 2 ne peut contenir que 100 caractères',



        ];
    }
}
