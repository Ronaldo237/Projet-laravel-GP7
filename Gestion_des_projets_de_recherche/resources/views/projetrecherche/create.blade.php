@extends("welcome")


@section('contenu')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Ajouter un projet de recherche</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
            <strong>Erreurs :</strong>
            <ul class="list-disc ml-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recherche.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Titre</label>
            <input type="text" name="titre" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Titre du projet" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Décrivez le projet..."></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Financement</label>
            <input type="text" name="financement" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Ex: Union Européenne">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">État</label>
            <select name="etat" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="En cours">En cours</option>
                <option value="Terminé">Terminé</option>
                <option value="Suspendu">Suspendu</option>
            </select>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-2">Date de début</label>
                <input type="date" name="date_debut" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Date de fin</label>
                <input type="date" name="date_fin" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Équipe de recherche</label>
            <textarea name="equipe_recherche" rows="2" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Ex: Dr. X, Prof. Y, etc."></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
