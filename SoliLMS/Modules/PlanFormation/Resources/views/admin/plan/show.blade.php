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
            <div class="mt-4 text-sm text-muted">
                <p>Module:
                    @if($plan->module)
                    <span class="font-weight-semibold text-dark">
                        {{$plan->modules->first()?->nom ?? 'No module'}}
                    </span>
                    @else
                    <span class="font-weight-semibold text-muted">No module available</span>
                    @endif
                </p>
            </div>

            <!-- Briefs -->
            <div class="mt-4 text-sm text-muted">
                <p>Briefs:
                    @if($plan->briefs)
                    <span class="font-weight-semibold text-dark">
                        @foreach($plan->briefs as $brief)
                        {{ $brief->titre }}@if(!$loop->last), @endif
                        @endforeach
                    </span>
                    @else
                    <span class="font-weight-semibold text-muted">No briefs available</span>
                    @endif
                </p>
            </div>

            <!-- Competences -->
            <div class="mt-4 text-sm text-muted">
                <p>Competences:
                    @if($plan->competences)
                        <span class="font-weight-semibold text-dark">
                            @foreach($plan->competences as $competence)
                                {{ $competence->nom }}@if(!$loop->last), @endif
                            @endforeach
                        </span>
                    @else
                        <span class="font-weight-semibold text-muted">No briefs available</span>
                    @endif
                </p>
            </div>

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

    <!-- Comments Section -->
    {{-- <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <h2 class="h3 font-weight-semibold text-dark text-center">Commentaires</h2>

                    <!-- Add Comment -->
                    <div class="form-outline mb-4">
                        <form action="{{route('comments.store')}}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $commentableId }}">
                            <input type="hidden" name="commentable_type" value="{{ $commentableType }}">
                            <input type="text" name="text" id="addComment" class="form-control" placeholder="Tapez un commentaire..." />
                            <button type="submit" class="btn btn-success my-2">Ajouter</button>
                        </form>
                    </div>
                    @foreach($article->comments as $comment)
                    <!-- Display Comments -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <p>{{$comment->text}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <p class="small mb-0 ms-2">comment author</p>
                                </div>
                                <div class="d-flex align-items-center text-body">
                                    <form action="{{route('comments.destroy', $comment->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
    @endsection
