@extends("welcome")


@section('contenu')
<div class="bg-white p-4 rounded-lg shadow w-full ">
    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Liste de nos Chercheurs</h2>
    <ul class="space-y-4">
        @foreach ($chercheurs as $chercheur)
        <li class="border-b pb-4">
            <p class="font-semibold">{{ $chercheur->user->name ?? 'Nom introuvable' }}</p>
            <p class="text-sm text-gray-600">{{ Str::limit($chercheur->biographie, 100) ?? 'Pas de biographie' }}</p>
        </li>
        @endforeach
    </ul>
</div>
@endsection
