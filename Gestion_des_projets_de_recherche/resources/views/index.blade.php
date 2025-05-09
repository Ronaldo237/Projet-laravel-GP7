@extends("welcome")

@stack('bootstrap.css')

@section("contenu")


<div class="flex items-center justify-center">

    <div class="text-center p-10 bg-white shadow-xl rounded-2xl max-w-xl">
        <h1 class="text-4xl font-bold text-blue-800 mb-4">Bienvenue sur notre plateforme !</h1>
        <p class="text-gray-700 mb-6">
            Explorez les projets de recherche, découvrez les publications et connectez-vous avec les chercheurs.
        </p>

        

        @auth
            <p class="text-green-600 font-semibold mt-4">Vous êtes connecté en tant que {{ Auth::user()->name }}</p>
            <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                Aller au tableau de bord
            </a>
        @endauth
    </div>

</div>

@stack('bootstrap.js')

@endsection
