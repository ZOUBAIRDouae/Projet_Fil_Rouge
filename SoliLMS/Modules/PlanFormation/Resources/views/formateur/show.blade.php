 @extends('PlanFormation::layouts.admin')

@section('content')
    <h1>Détails du formateur</h1>

    <p><strong>Utilisateur :</strong> {{ $formateur->user->name }} ({{ $formateur->user->email }})</p>
    <p><strong>Nom :</strong> {{ $formateur->nom }}</p>
    <p><strong>Prénom :</strong> {{ $formateur->prenom }}</p>
    <p><strong>Téléphone :</strong> {{ $formateur->telephone }}</p>

    <a href="{{ route('formateurs.create') }}">Créer un nouveau formateur</a>
@endsection
