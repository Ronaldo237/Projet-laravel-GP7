@extends("welcome")

@stack('bootstrap.css')

@section("contenu")





<div class="w-2/3">



    <h1>Vous êtes sur la page d'accueil de notre application de gestion de des recherches.</h1>
    <div class="flex items-center">
        <a class="btn btn-success bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
         href="{{ route('login') }}">
            {{ __('Se connecter') }}
        </a>

    </div>

</div>

@stack('bootstrap.js')

@endsection
