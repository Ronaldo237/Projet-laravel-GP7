@extends("welcome")


@section('contenu')
<div class=" mx-auto p-10 w-full">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('create.recherche') }}"
            class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 text-center rounded-lg">
            Debuter une nouvelle recherche
        </a>
    </div>

    <div class="max-w-4xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Mes Recherches</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($mes_projet_recherche as $projet)
            <div class="max-w-md bg-white shadow-lg rounded-xl p-6 mb-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $projet->titre }}</h2>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-600 mr-2">État :</span>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                        {{ $projet->etat }}
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-1"><strong>Date de début :</strong> {{ $projet->date_debut }}</p>
                <p class="text-sm text-gray-600 mb-4"><strong>Date de fin :</strong> {{ $projet->date_fin }}</p>

                <a href=""
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                    Voir détails
                </a>
            </div>

            @endforeach
        </div>

</div>
@endsection
