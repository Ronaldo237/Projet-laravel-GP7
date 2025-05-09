@extends('welcome')

@section('contenu')
    <div class="container m-3 ">

        <h2 class="text-center mt-2">Listes Des Publications Disponibles </h2>

        @auth
            @if (Auth::user()->role === 'chercheur')
            <a href="/create/publication" type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Ajouter
            </a>
            @endif
        @endauth

        <hr>

        <div class="container mt-4">

            <div class="row">

                @forelse ($publication as $pub)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="card h-100 shadow-sm">

                            <img src="https://www.google.com/imgres?q=img%20project%20chercher&imgurl=https%3A%2F%2Fmedia.istockphoto.com%2Fid%2F1411195926%2Ffr%2Fphoto%2Fchef-de-projet-travaillant-sur-ordinateur-portable-et-mettant-%25C3%25A0-jour-la-planification-de.jpg%3Fs%3D612x612%26w%3D0%26k%3D20%26c%3DHi2f7qj84Cqy9IBLb7mQq5O339fpLLL0c8Mkz0R2MDc%3D&imgrefurl=https%3A%2F%2Fwww.istockphoto.com%2Ffr%2Fphotos%2Fgestion-de-projet&docid=iLUa-bqmRMVtLM&tbnid=mYcamr2s8sjNeM&vet=12ahUKEwiYr7u0k-iMAxVPJbkGHd4xN-UQM3oECE8QAA..i&w=612&h=327&hcb=2&ved=2ahUKEwiYr7u0k-iMAxVPJbkGHd4xN-UQM3oECE8QAA"
                                class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">{{ $pub->titre }}</h5>
                                    <a href="#" class="card-text">{{ $pub->publications_id }}</a>
                                </div>
                                <h5 class="card-title">{{ $pub->resume }}</h5>
                                <a href="#" class="card-text">{{ $pub->lien }}</a>
                                <div>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true">{{ $pub->fichier_pdf }}</i>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#" class="btn btn-outline-primary"><i class="fa fa-eye-low-vision"></i>
                                        View</a>
                                </div>
                            </div>
                        </div>



                    </div>

                @empty
                    <div class="alert alert-danger">
                        <h3 class="text-center">Aucune Publication Disponible</h3>
                    </div>
                @endforelse

            </div>

        </div>

    </div>

@endsection
