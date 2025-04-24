@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-success shadow-lg mx-auto" style="max-width: 800px;">
        <div class="card-header bg-success text-white text-center">
            <h4 class="mb-0">Formulaire d'inscription du chercheur</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('chercheurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CV (PDF)</label>
                        <input type="file" name="cv" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biographie</label>
                    <textarea name="biographie" class="form-control" rows="3">{{ old('biographie') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Spécialisation</label>
                    <input type="text" name="specialisation" class="form-control" value="{{ old('specialisation') }}">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Lien Google Scholar</label>
                        <input type="url" name="google_scholar" class="form-control" value="{{ old('google_scholar') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lien LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Utilisateur associé</label>
                        <select name="user_id" class="form-select">
                            <option value="">Sélectionner un utilisateur</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Domaine de recherche</label>
                        <select name="domaine_recherche_id" class="form-select">
                            <option value="">Choisir un domaine</option>
                            @foreach ($domaines as $domaine)
                                <option value="{{ $domaine->id }}">{{ $domaine->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 px-4">Valider</button>
                    <a href="{{ route('chercheurs.index') }}" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
