@extends('welcome')

@section('contenu')

   
        <div class="container m-4">

            {{-- <div class="row d-flex justify-content-space-beetwem align-items-center">

                <div class="col"></div> --}}

            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card">
                    <div class="card-title text-center">
                        <h2>Enregistrer Un Chercheur</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create.chercheur') }}" method="POST">
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
                                <label for="speudo">Nom</label>
                                <input type="text" name="speudo" id="speudo" class="form-control"
                                    placeholder="Enter your nom " value="{{old('speudo')}}">

                                @error('speudo')
                                    <p class="text text-danger">{{$message}}</p>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="specialite" class="label-form">Titre</label>
                                <input type="text" name="specialite" id="specialite" class="form-control"
                                    placeholder="Enter a specialite of your Projet" value="{{old('specialite')}}">

                                @error('specialite')
                                    <p class="text text-danger">
                                        {{ $message}}
                                    </p>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="laboratoire" class="label-form">Resume</label>
                                <input name="laboratoire" id="laboratoire" placeholder="Enter Small Resume" class="form-control" value="{{old('laboratoire')}}"/>

                                @error('laboratoire')
                                    <p class="text text-danger">
                                        {{ $message}}
                                    </p>
                                @enderror

                            </div>


                        </div>

                        <div class="form-group">
                            <label for="photo" class="label-form">Lien</label>
                            <input type="image" name="photo" id="photo" class="form-control"
                                placeholder="Lien vers le projet" value="{{old('photo')}}" accept=".png|.jpg|.jpeg">
                            @error('photo')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="biographie" class="label-form">Document</label>
                            <textarea name="biographie" id="biographie" class="form-control"
                                placeholder="Enter the Document" value="{{old('biographie')}}"></textarea>

                            @error('biographie')
                                <p class="text text-danger">
                                    {{ $message}}
                                </p>
                            @enderror

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="google_scholar" class="label-form">Lien</label>
                        <input type="text" name="google_scholar" id="google_scholar" class="form-control"
                            placeholder="Lien vers le projet" value="{{old('google_scholar')}}">

                        @error('google_scholar')
                            <p class="text text-danger">
                                {{ $message}}
                            </p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="cv" class="label-form">Document</label>
                        <input type="text" name="cv" id="cv" class="form-control"
                            placeholder="Enter the Document" accept=".pdf" value="{{old('cv')}}">

                        @error('cv')
                            <p class="text text-danger">
                                {{ $message}}
                            </p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="linkedin" class="label-form">Document</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control"
                            placeholder="Entrer votre linkedin" value="{{old('linkedin')}}">

                        @error('linkedin')
                            <p class="text text-danger">
                                {{ $message}}
                            </p>
                        @enderror

                    </div>


                            <div class="form-group">
                                <label for="users_id">Domaine De Recherche</label>
                                <select name="users_id" id="users_id" class="form-control">
                                    <option value="">-- Sélectionnez une catégorie --</option>
                                    @foreach ($user as $utilisateur)
                                        <option value="{{ $utilisateur->users_id }}">{{ $utilisateur->name }}</option>
                                    @endforeach
                                </select>

                                @error('users_id')
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

