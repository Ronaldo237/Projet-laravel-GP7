<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChercheurRequest extends FormRequest
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
            'speudo' => 'required|string|max:255',
            //'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo' => 'required',
            'biographie' => 'nullable|string',
            //'cv' => 'nullable|file|mimes:pdf|max:2048',
            'cv' => 'required',
            'google_scholar' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'user_id' => 'exists:users,id',
            'domaine_recherche_id' => 'exists:domaines_recherche,id',
        ];
    }

    public function message(){
        return[
            'speudo.required' => 'Le pseudo est requis.',
            'speudo.string' => 'Le pseudo doit être une chaîne de caractères.',
            'speudo.max' => 'Le pseudo ne doit pas dépasser 255 caractères.',
            'photo.image' => 'La photo doit être une image.',
            'photo.mimes' => 'La photo doit être au format jpeg, png, jpg ou gif.',
            'photo.max' => 'La photo ne doit pas dépasser 2 Mo.',
            'biographie.string' => 'La biographie doit être une chaîne de caractères.',
            'cv.file' => 'Le CV doit être un fichier.',
            'cv.mimes' => 'Le CV doit être au format pdf.',
            'cv.max' => 'Le CV ne doit pas dépasser 2 Mo.',
            'google_scholar.url' => 'L\'URL de Google Scholar est invalide.',
            'linkedin.url' => 'L\'URL de LinkedIn est invalide.',
            'user_id.required' => 'L\'ID de l\'utilisateur est requis.',
            'user_id.exists' => 'L\'utilisateur n\'existe pas.',
            'domaine_recherche_id.required' => 'L\'ID du domaine de recherche est requis.',
            'domaine_recherche_id.exists' => 'Le domaine de recherche n\'existe pas.',
        ];
    }
}
