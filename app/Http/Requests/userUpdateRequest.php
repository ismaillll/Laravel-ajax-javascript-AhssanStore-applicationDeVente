<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userUpdateRequest extends FormRequest
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
            'email' => 'required|unique:users,email,'.$this->user.'|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'vous devez saisir ce champs ',
            'email.unique' => 'ce mail est déja pris ',
            'email.email' => 'ce mail n\'est pas sous format email  ',



        ];
    }
}
