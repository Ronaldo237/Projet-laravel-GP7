@extends("welcome")
@section('contenu')
<div class="w-full mt-5 px-4 ">
    <h1 class="text-green-600 mb-4 text-2xl font-semibold">Liste des Chercheurs</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-full">
        @foreach($chercheurs as $chercheur)
        <div class="w-full md:w-1/3 px-2 mb-4 ">
            <div class="border border-green-600 shadow rounded-lg overflow-hidden">
                @if($chercheur->photo)
                    <img src="{{ asset('storage/' . $chercheur->photo) }}" alt="Photo" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h5 class="text-green-600 text-lg font-semibold">{{ $chercheur->user->name ?? 'Chercheur inconnu' }}</h5>
                    <h6 class="text-gray-500 mb-2">{{ $chercheur->specialisation ?? 'Non spécifiée' }}</h6>
                    <p class="text-gray-700">{{ Str::limit($chercheur->biographie, 100) }}</p>
                    <div class="mt-3 space-x-2">
                        <a href="{{ route('chercheurs.create', $chercheur->id) }}" class="inline-block border border-green-600 text-green-600 rounded px-3 py-1 text-sm hover:bg-green-100 transition">Voir</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

