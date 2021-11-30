<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StagiaireStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required'],
            'birthday' => ['required', 'date', 'min:4'],
            'birthplace' => ['required', 'string'],
            'adress' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:10,15'],
            'email' => ['required', 'email'],
            'annee' => ['required', 'numeric', ],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'attachment' => ['required', 'boolean'],
            'memoire' => ['required', 'boolean'],
            'date_depose_memoire' => ['nullable', 'date'],
            // 'specialite_id' => ['required'],
            // 'departement_id' => ['required'],
            // 'encadreur_id' => ['required'],
            // 'stage_id' => ['required'],
            // 'universite_id' => ['required'],
        ];
    }
}
