@extends("welcome")

@section("contenu")
<div class="w-2/3">
    <h1>Vous êtes sur la page d'accueil de notre application de gestion de des recherches.</h1>
    <p class="text-red-500 p-2">NB: cette page est un exemple. pour faire vos fontionnalités creer vos
        propre page utilisez l'extension de vue blade <b>welcome</b>
        et partir du <b>yield contenu</b> inserez votre contenu et mettez sa route dans <b>web.php</b>
        c'est apres quelques fonctionnalités qu'on va gerer le design.
    </p>
</div>
@endsection
