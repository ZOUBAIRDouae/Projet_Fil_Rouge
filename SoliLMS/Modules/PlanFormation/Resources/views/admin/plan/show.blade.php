@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 font-weight-bold text-dark">Détails du plan Annuel</h1>
        <p class="lead text-muted">Explorez les détails du plan.</p>
    </div>
    @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    <!-- Plan Card -->
    <div class="card shadow-lg border-0 mb-5">
        <div class="card-body">
            <!-- Plan Filiere -->
            <h2 class="h3 font-weight-semibold text-dark">{{ $plan->filiere }}</h2>
            <!-- Modules -->
            <p>Modules:
            @if($plan->modules && $plan->modules->isNotEmpty())
                <span class="font-weight-semibold text-dark">
                    {{ $plan->modules->first()->nom }}
                </span>
            @else
                <span class="font-weight-semibold text-muted">No module available</span>
            @endif
            </p>
            <!-- Briefs -->
            <p>Briefs:
                @if($plan->briefProjets && $plan->briefProjets->isNotEmpty())
                <span class="font-weight-semibold text-dark">
                    @foreach($plan->briefProjets as $brief)
                        {{ $brief->titre }}@if(!$loop->last), @endif
                    @endforeach
                </span>
                @else
                    <span class="font-weight-semibold text-muted">No briefs available</span>
                @endif
            </p>
            <!-- Competences -->
            <p>Competences:
                @if($plan->competences && $plan->competences->isNotEmpty())
                    <span class="font-weight-semibold text-dark">
                @foreach($plan->competences as $competence)
                    {{ $competence->nom }}@if(!$loop->last), @endif
                @endforeach
                    </span>
                @else
                    <span class="font-weight-semibold text-muted">No competences available</span>
                @endif
            </p>
            <!-- Action Buttons -->
            <div class="mt-5 d-flex justify-content-between">
                <!-- Back to plan Button -->
                <form action="/plans" method="GET">
                    <button type="submit" class="btn btn-secondary">Retour au plan</button>
                </form>

                <div>
                    <!-- Edit Plan Button -->
                    @can('update', $plan)
                    <form action="/plans/{{ $plan->id }}/edit" method="GET" class="d-inline">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                    @endcan

                    <!-- Delete Plan Button -->
                    @can('delete', $plan)
                    <form action="/plans/{{ $plan->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection
