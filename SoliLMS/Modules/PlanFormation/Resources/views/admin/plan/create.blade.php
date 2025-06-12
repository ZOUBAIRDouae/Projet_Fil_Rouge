@extends('layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h5>Ajouter un Plan</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('plan_annuels.store') }}">
            @csrf

            {{-- Filiere --}}
            <div class="mb-3">
              <label for="title" class="form-label">Filière</label>
              <input
                type="text"
                name="filiere"
                class="form-control"
                id="filiere"
                placeholder="filiere du plan"
                value="{{ old('filiere') }}"
                required>
            </div>

            {{-- Module --}}
            <div class="mb-3">
              <label for="module" class="form-label">Module</label>
              <select
                name="module"
                class="form-select"
                id="module"
                required>
                <option value="" hidden>-- Choisir un module --</option>
                @foreach($modules as $module)
                  <option value="{{ $module->id }}">
                    {{ $module->nom }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Briefs (Multi-Select Dropdown) --}}
            <div class="mb-3">
              <label for="briefs" class="form-label">Briefs Projets</label>
              <select
                name="briefs[]"
                id="briefs"
                class="form-select"
                multiple>
                @foreach($allBriefs as $brief)
                  <option value="{{ $brief->id }}">
                    {{ $brief->titre }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Competences (Multi-Select Dropdown) --}}
            <div class="mb-3">
              <label for="competences" class="form-label">Compétences</label>
              <select
                name="competences[]"
                id="competences"
                class="form-select"
                multiple>
                @foreach($allCompetences as $competence)
                  <option value="{{ $competence->id }}">
                    {{ $competence->nom }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Contenu --}}
            {{-- <div class="mb-3">
              <label for="content" class="form-label">Contenu</label>
              <textarea
                name="content"
                class="form-control summernote"
                id="summernote"
                rows="5"
                placeholder="Contenu de plan de formation"
                required>{{ old('content') }}</textarea>
            </div> --}}

            {{-- Boutons d'action --}}
            <div class="text-center">
              <a href="{{ route('plans.index') }}" class="btn btn-secondary">Retour</a>
              <button type="submit" class="btn btn-success px-4">Ajouter</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      placeholder: 'Rédigé votre plan ici...',
      tabsize: 2,
      height: 200
    });
  });
</script>