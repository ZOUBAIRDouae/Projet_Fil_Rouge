@extends('adminlte::page')


@section('title', 'Tableau de Bord')

@section('content_header')
    <h1>Tableau de Bord</h1>
@stop

@section('content')
<div class="row">
        {{-- Bloc Modules --}}
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-layer-group fa-2x text-primary mb-2"></i>
                    <h5>Modules</h5>
                    <p class="display-4">{{ $nbModules }}</p>
                    <a href="{{ route('modules.index') }}" class="btn btn-secondary btn-sm">Afficher les modules</a>
                </div>
            </div>
        </div>
    
        {{-- Bloc Formateurs --}}
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-user fa-2x text-primary mb-2"></i>
                    <h5>Formateurs</h5>
                    <p class="display-4">{{ $nbFormateurs }}</p>
                </div>
            </div>
        </div>
    
        {{-- Bloc Compétences --}}
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-check fa-2x text-primary mb-2"></i>
                    <h5>Compétences</h5>
                    <p class="display-4">{{ $nbCompetences }}</p>
                </div>
            </div>
        </div>

    {{-- Bloc Séances --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>Formations</strong>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <i class="fas fa-calendar-alt fa-2x text-primary mr-3"></i>
                    <div>
                        <strong>Séances</strong><br>
                        @forelse ($prochainesSeances as $seance)
                            <div>
                                {{ \Carbon\Carbon::parse($seance->heure_debut)->format('d/m/Y H:i') }} à 
                                {{ \Carbon\Carbon::parse($seance->heure_fin)->format('H:i') }}
                            </div>
                        @empty
                            <div>Aucune séance prévue</div>
                        @endforelse
                    </div>
                </div>
                <a href="{{ route('seances.index') }}" class="btn btn-primary btn-sm mt-3">Voir le planning</a>
            </div>
        </div>
    </div>

    {{-- Bloc Briefs (Exemple statique, tu peux l’adapter si tu veux lier aux données) --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>Formations</strong>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <i class="fas fa-clipboard fa-2x text-primary mr-3"></i>
                    <div>
                        <strong>Briefs projet</strong><br>
                        Développement d’un portfolio web
                    </div>
                </div>
                <div class="mt-3">
                    <strong>Cours</strong><br>
                    <span class="badge badge-secondary">A fair</span>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
