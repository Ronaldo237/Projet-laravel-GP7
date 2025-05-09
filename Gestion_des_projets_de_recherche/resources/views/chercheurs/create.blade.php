{{-- @extends("welcome")


@section('contenu')
<div class="max-w-4xl mx-auto mt-5">
    <div class="border border-green-600 shadow-lg rounded-lg mx-auto" style="max-width: 800px;">
        <div class="bg-green-600 text-white text-center rounded-t-lg py-3">
            <h4 class="mb-0 text-lg font-semibold">Formulaire d'inscription du chercheur</h4>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="mb-0 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('chercheurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-wrap -mx-2 mb-3">
                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">Photo</label>
                        <input type="file" name="photo" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">CV (PDF)</label>
                        <input type="file" name="cv" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block mb-1 font-medium text-gray-700">Biographie</label>
                    <textarea name="biographie" rows="3" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('biographie') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="block mb-1 font-medium text-gray-700">Spécialisation</label>
                    <input type="text" name="specialisation" value="{{ old('specialisation') }}" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div class="flex flex-wrap -mx-2 mb-3">
                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">Lien Google Scholar</label>
                        <input type="url" name="google_scholar" value="{{ old('google_scholar') }}" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">Lien LinkedIn</label>
                        <input type="url" name="linkedin" value="{{ old('linkedin') }}" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-3">
                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">Utilisateur associé</label>
                        <select name="user_id" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Sélectionner un utilisateur</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-1/2 px-2">
                        <label class="block mb-1 font-medium text-gray-700">Domaine de recherche</label>
                        <select name="domaine_recherche_id" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="">Choisir un domaine</option>
                            @foreach ($domaines as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="submit" class="bg-green-600 text-white rounded px-6 py-2 hover:bg-green-700 transition">Valider</button>
                    <a href="{{ route('chercheurs.index') }}" class="border border-gray-400 rounded px-6 py-2 text-gray-700 hover:bg-gray-100 transition">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection --}}

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
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Créer mon Profil Chercheur</h2>

    <form action="{{ route('chercheurs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 mb-2">Photo de Profil</label>
            <input type="file" name="photo" class="block w-full text-gray-700 border rounded p-2">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Biographie</label>
            <textarea name="biographie" rows="4" class="block w-full text-gray-700 border rounded p-2" placeholder="Parlez un peu de vous..."></textarea>
        </div>

        <div>
            <label class="block text-gray-700 mb-2">CV (PDF uniquement)</label>
            <input type="file" name="cv" class="block w-full text-gray-700 border rounded p-2">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Lien Google Scholar</label>
            <input type="url" name="google_scholar" class="block w-full text-gray-700 border rounded p-2" placeholder="https://scholar.google.com/...">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Lien LinkedIn</label>
            <input type="url" name="linkedin" class="block w-full text-gray-700 border rounded p-2" placeholder="https://linkedin.com/in/...">
        </div>

        <div>
            <label class="block text-gray-700 mb-2">Domaine de Recherche</label>
            <select name="domaines_recherche_id" required class="block w-full text-gray-700 border rounded p-2">
                <option value="">-- Choisissez un domaine --</option>
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->domaines_recherche_id }}">{{ $domaine->nom }}</option>
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

