
@extends("welcome")


@section('contenu')
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md mt-10">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Modifier mon Profil Chercheur</h2>

    <form action="{{ route('chercheurs.update', $chercheur) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 mb-2">Photo de Profil</label>
            <input type="file" name="photo" value="{{ $chercheur->photo }}" class="block w-full text-gray-700 border rounded p-2">
            @if ($chercheur->photo)
                <img src="{{ asset('storage/' . $chercheur->photo) }}" alt="Photo de Profil" class="mt-2 w-32 h-32 object-cover rounded-full">
            @endif
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Biographie</label>
            <textarea name="biographie" rows="4"
            class="block w-full text-gray-700 border rounded p-2" placeholder="Parlez un peu de vous...">
            {{ $chercheur->biographie }}
        </textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">specialité</label>
            <input type="text" name="specialite" value="{{ $chercheur->specialite }}"
            class="block w-full text-gray-700 border rounded p-2" placeholder="votre specialisation">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Laboratoire</label>
            <select name="laboratoire" required class="block w-full text-gray-700 border rounded p-2">
                <option value="laboratoire 1" {{ $chercheur->laboratoire == 'laboratoire 1' ? 'selected' : '' }}>laboratoire 1</option>
                <option value="laboratoire 2" {{ $chercheur->laboratoire == 'laboratoire 2' ? 'selected' : '' }}>laboratoire 2</option>
                <option value="laboratoire 3" {{ $chercheur->laboratoire == 'laboratoire 3' ? 'selected' : '' }}>laboratoire 3</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">CV (PDF uniquement)</label>
            <input type="file" name="cv" value="{{ $chercheur->cv }}"
            class="block w-full text-gray-700 border rounded p-2">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Lien Google Scholar</label>
            <input type="url" name="google_scholar" value="{{ $chercheur->google_scholar }}"
            class="block w-full text-gray-700 border rounded p-2" placeholder="https://scholar.google.com/...">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Lien LinkedIn</label>
            <input type="url" name="linkedin"  value="{{ $chercheur->linkedin }}"
            class="block w-full text-gray-700 border rounded p-2" placeholder="https://linkedin.com/in/...">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Domaine de Recherche</label>
            <select name="domaines_recherche_id" required class="block w-full text-gray-700 border rounded p-2">
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->domaines_recherche_id }}" {{ $domaine->domaines_recherche_id == $chercheur->domaines_recherche_id ? 'selected' : '' }}>
                        {{ $domaine->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
