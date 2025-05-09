@extends("welcome")
@section('contenu')
<div class="max-w-4xl mx-auto py-10 px-4">
    <!-- Section bienvenue -->
    <div class="bg-blue-100 p-6 rounded-xl shadow-sm mb-8 text-center">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">
            Bienvenue, {{ Auth::user()->name }} !
        </h1>
        <p class="text-blue-700">Nous sommes ravis de vous revoir sur votre espace personnel.</p>
    </div>

    <!-- Section profil chercheur -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Votre Profil</h2>
        <p class="text-lg text-gray-700 mb-4">
            <strong>Nom :</strong> {{ Auth::user()->name}}
        </p>
        <p class="text-gray-600 mb-6">
            <strong>Biographie :</strong>
            @if (!empty($chercheurs) && !empty($chercheurs->biographie))
            {{ Str::limit($chercheurs->biographie, 150) }}
            @else
                Pas encore de profil.
            @endif
        </p>

        <div class="flex space-x-4">
            @if (!empty($chercheurs) && !empty($chercheurs->biographie))
            <a href="{{ route('chercheurs.create') }}"
               class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
               Modifier mon Profil
            </a>
            @endif
            @if (empty($chercheurs) && empty($chercheurs->biographie))
            <a href="{{ route('chercheurs.create') }}"
               class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">
               Créer mon Profil
            </a>
            @endif
        </div>
    </div>

    <!-- Section gestion des recherches -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Mes Recherches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('chercheurs.create') }}"
               class="block bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 text-center rounded-lg">
               Voir toutes mes recherches
            </a>
            <a href="{{ route('chercheurs.create') }}"
               class="block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 text-center rounded-lg">
               Ajouter une nouvelle recherche
            </a>
            <a href="{{ route('chercheurs.create') }}"
               class="block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 text-center rounded-lg">
               Modifier une recherche
            </a>
            <a href="{{ route('chercheurs.create') }}"
               class="block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 text-center rounded-lg">
               Supprimer une recherche
            </a>
        </div>
    </div>
    <div class="mt-3 w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-2 w-full block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 text-center rounded-lg">Se déconnecter</button>
        </form>
    </div>
</div>
@endsection
