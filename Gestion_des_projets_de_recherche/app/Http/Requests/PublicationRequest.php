<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'chercheurs_id' => 'required',
            'titre' => 'required|max:255',
            'resume' => 'required|max:1000',
            'lien' => 'required',
            'domaines_recherche_id' => 'required',
            'fichier_pdf' => 'string',

        ];
    }

    public function message(){
        return[
            'titre.required' => 'Le titre est requit .',
            'titre.max' => 'Le titre ne devra pas dépassé 255 caractères .',
            'chercheurs_id.required' => 'Veuillez Selectionnewz un Chercheur pour cette publications .',
            'resume.required' => 'Un resume est requit .',
            'lien.required' => 'Un resume est requit .',
            'resume.max' => 'Le resumé ne devra pas dépassé 1000 caractères .',
            'domaines_recherche_id.required' => 'Veuillez Selectionnewz un domaine de recherche .',
            'fichier_pdf.required' => 'Un document est requit pour ce projet .',

        ];
    }
}
