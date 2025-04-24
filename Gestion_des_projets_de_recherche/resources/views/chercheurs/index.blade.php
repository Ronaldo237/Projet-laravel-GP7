<a href="{{ route('chercheurs.create') }}" class="text-white bg-green-600 px-4 py-2 rounded hover:bg-green-700">
    + Nouveau Chercheur
</a>


@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-success mb-4">Liste des Chercheurs</h1>

    <a href="{{ route('chercheurs.create') }}" class="btn btn-success mb-3">
        + Nouveau Chercheur
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($chercheurs as $chercheur)
        <div class="col-md-4">
            <div class="card mb-4 border-success shadow">
                @if($chercheur->photo)
                    <img src="{{ asset('storage/' . $chercheur->photo) }}" class="card-img-top" alt="Photo">
                @endif
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $chercheur->user->name ?? 'Chercheur inconnu' }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $chercheur->specialisation ?? 'Non spécifiée' }}</h6>
                    <p class="card-text">{{ Str::limit($chercheur->biographie, 100) }}</p>
                    <a href="{{ route('chercheurs.show', $chercheur->id) }}" class="btn btn-outline-success btn-sm">Voir</a>
                    <a href="{{ route('chercheurs.edit', $chercheur->id) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
