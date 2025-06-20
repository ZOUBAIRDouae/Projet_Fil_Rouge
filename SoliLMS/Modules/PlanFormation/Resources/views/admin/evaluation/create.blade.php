@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h5>Ajouter Type d'Evaluation</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('evaluations.store') }}">
            @csrf
            <div class="mb-3">
              <label for="type" class="form-label">Type</label>
              <input type="text" name="type" class="form-control" id="type" placeholder="type d'evaluation" required>
            </div>
            <div class="mb-3">
              <label for="module_id" class="form-label">Module</label>
              <select name="module_id" id="module_id" class="form-select" multiple required>
                <option value="">-- Sélectionner un module --</option>
                @foreach ($modules as $module)
                  <option value="{{ $module->id }}">{{ $module->nom }}</option>
                @endforeach
              </select>
            </div>          
            <div class="mb-3">
              <label for="brief_projet_id" class="form-label">Brief Projet</label>
              <select name="brief_projet_id" id="brief_projet_id" class="form-select" multiple required>
                <option value="">-- Sélectionner un brief --</option>
                @foreach ($briefs as $brief)
                  <option value="{{ $brief->id }}">{{ $brief->titre ?? 'Brief #' . $brief->id }}</option>
                @endforeach
              </select>
            </div>                       
            <div class="text-center">
              <button type="submit" class="btn btn-success px-4">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
