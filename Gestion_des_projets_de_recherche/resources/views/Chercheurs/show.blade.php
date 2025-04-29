@extends('welcome')

@section('contenu')
    <div class="container m-3 ">

        <h2 class="text-center mt-2">Listes Des Chercheurs Disponibles </h2>

        <hr>

        {{-- <div class="row m-2">

            <div class="col">

                <button class="btn btn-info"> <i class="fa fa-filter" aria-hidden="true"></i> Filtrer par :</button>

                <div class="form-group">
                    <label for="domaines_recherche_id">Domaine de Recherche</label>
                    <select name="domaines_recherche_id" id="domaines_recherche_id" class="form-control">
                        <option value="">-- Sélectionnez un domaine de recherche --</option>
                        @foreach ($domaines_recherche as $auteur)
                            <option value="{{ $auteur->domaines_recherche_id }}">{{ $auteur->nom }}</option>
                            </option>
                        @endforeach
                    </select>

                    @error('chercheurs_id')
                        <p class="text text-danger">{{$message}}</p>
                    @enderror

                </div>

            </div>



            <div class="col">



            <button class="btn btn-info"> <i class="fa fa-search-minus" aria-hidden="true"></i> rechercher par :</button>

            <div class="form-group">
                <label for="speudo" class="label-form">Speudo</label>
                <input type="text" name="speudo" id="speudo" class="form-control"
                    placeholder="Enter a Title of your Projet" value="{{old('speudo')}}">

                @error('speudo')
                    <p class="text text-danger">
                        {{ $message}}
                    </p>
                @enderror

            </div>

            <div class="form-group">
                <label for="specialite" class="label-form">Specialite</label>
                <input type="text" name="specialite" id="specialite" class="form-control"
                    placeholder="Enter a Title of your Projet" value="{{old('specialite')}}">

                @error('specialite')
                    <p class="text text-danger">
                        {{ $message}}
                    </p>
                @enderror

            </div>

        </div> --}}

        </div>


        <hr>

        <a href="/create/publication" type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Ajouter
        </a>
        <hr>
    <div class="container mt-4">
        <div class="row">
            @forelse ($chercheurs as $pub)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pub->chercheurs_id }}</h5>
                            <p class="card-text">{{ $pub->speudo }}</p>
                            <p class="card-text">{{ $pub->domaines_recherche_id }}</p>
                            <p class="card-text">{{ $pub->laboratoire }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-outline-primary"><i class="fa fa-eye"></i> Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    <h3 class="text-center">Aucun Chercheur Trouvé</h3>
                </div>
            @endforelse

        </div>

    </div>

    </div>

@endsection
