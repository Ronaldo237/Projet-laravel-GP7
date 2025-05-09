@extends('welcome')

@section('contenu')
    <div class="container m-4">

        {{-- <div class="row d-flex justify-content-space-beetwem align-items-center">

            <div class="col"></div> --}}

        <div class="d-flex justify-content-center align-items-center vh-50">
            <div class="card">
                <div class="card-title text-center">
                    <h2>Nouvelle Publications</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('create.publication') }}" method="POST">
                        @csrf
                        @method('POST')

                        @if (session('success'))
                            <div class="alert alert-success text-center text-black">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('echec'))
                            <div class="alert alert-danger text-center text-black">
                                {{ session('echec') }}
                            </div>
                        @endif


                        

                        <div class="form-group">
                            <label for="titre" class="label-form">Titre</label>
                            <input type="text" name="titre" id="titre" class="form-control"
                                placeholder="Enter a Title of your Projet" value="{{old('titre')}}">

                            @error('titre')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="resume" class="label-form">Resume</label>
                            <textarea name="resume" id="resume" placeholder="Enter Small Resume" class="form-control" value="{{old('resume')}}"></textarea>

                            @error('resume')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="domaines_recherche_id">Domaine De Recherche</label>
                            <select name="domaines_recherche_id" id="domaines_recherche_id" class="form-control">
                                <option value="">-- Sélectionnez une catégorie --</option>
                                @foreach ($domaines_recherche as $category)
                                    <option value="{{ $category->domaines_recherche_id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>

                            @error('domaines_recherche_id')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="lien" class="label-form">Lien</label>
                            <input type="text" name="lien" id="lien" class="form-control"
                                placeholder="Lien vers le projet" value="{{old('lien')}}">

                            @error('lien')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="fichier_pdf" class="label-form">Document</label>
                            <input type="file" name="fichier_pdf" id="fichier_pdf" class="form-control"
                                placeholder="Enter the Document" accept=".pdf" value="{{old('fichier_pdf')}}">

                            @error('fichier_pdf')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>

                </form>
            </div>


        </div>
        {{-- </div>

        <div class="col"></div> --}}

    </div>

    </div>
@endsection
