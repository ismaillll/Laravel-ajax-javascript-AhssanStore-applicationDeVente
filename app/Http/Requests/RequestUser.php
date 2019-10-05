<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
             'name' => 'required|max:25',
             'email' => 'required|unique:users|email',
             'telephone' => 'required|unique:users|numeric',
             'password' => 'required|max:25',
             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'role' => 'required',
             'adresse' => 'required|max:100',
         ];
     }

     public function messages()
     {
         return [
             'name.required' => 'vous devez saisir le nom ',
             'nom.max' => ' le nom peut contenir 25 caractères au maximum ',
             'email.email' => 'cela ne ressemble pas au format email',
             'email.required' => 'le champs email et oubligatoire',
             'email.unique' => 'ce mail est déjà  pris',
             'telephone.required' => 'le téléphone est obligé! saisir le téléphone',
             'telephone.unique' => 'ce numéro est déjà  pris',
             'telephone.numeric' => 'le téléphone ne peut contenir que des numéros',
             'password.required' => 'vous devez saisir le nom ',
             'password.max' => ' le nom peut contenir 25 caractères au maximum ',
             'role.required' => 'role est obligé! cocheé un role ',
             'photo.image' => 'il ressemble pas d\'une image ',
             'photo.mimes' => 'l\'image doit étre sous format jpeg,png,gif ou svg ',
             'photo.max' => 'l\'image  peut contenir 8000 de taille au maximum  ',
             'adresse.required' => 'adresse est obligé! saisir une adresse ',
             'adresse.max' => 'adresse ne peut contenir que 100 caractères',




         ];
     }
}
