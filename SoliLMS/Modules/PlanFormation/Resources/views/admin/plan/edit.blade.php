@extends('layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
          <h5>Modifier un Article</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('plans.update', $plan->id) }}">
            @method('PUT')
            @csrf

            {{-- Filiere --}}
            <div class="mb-3">
              <label for="filiere" class="form-label">Filiere</label>
              <input
                type="text"
                name="filiere"
                class="form-control"
                id="filiere"
                placeholder="plan de filiere"
                value="{{ old('filiere', $plan->filiere) }}"
                required>
            </div>

            {{-- Module --}}
            <div class="mb-3">
              <label for="category" class="form-label">Module</label>
              <select
                name="module"
                class="form-select"
                id="module"
                required>
                @foreach($modules as $module)
                  <option value="{{ $module->id }}"
                    {{ $plan->module_id == $module->id ? 'selected' : '' }}>
                    {{ $module->nom }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Briefs (Multi-Select Dropdown) --}}
            <div class="mb-3">
              <label for="briefs" class="form-label">Brief projet</label>
              <select
                name="briefs[]"
                id="briefs"
                class="form-select"
                multiple>
                @foreach($allBriefs as $brief)
                  <option value="{{ $brief->id }}"
                    {{ in_array($brief->id, $selectedBriefs) ? 'selected' : '' }}>
                    {{ $brief->titre }}
                  </option>
                @endforeach
              </select>
            </div>

            
            {{-- Competence (Multi-Select Dropdown) --}}
            <div class="mb-3">
              <label for="competences" class="form-label">Competences</label>
              <select
                name="competences[]"
                id="competences"
                class="form-select"
                multiple>
                @foreach($allCompetences as $competence)
                  <option value="{{ $competence->id }}"
                    {{ in_array($competence->id, $selectedCompetences) ? 'selected' : '' }}>
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
                class="form-control"
                id="summernote"
                rows="5"
                placeholder="Contenu de l'article"
                required>{{ old('content', $article->content) }}</textarea>
            </div> --}}

            {{-- Boutons d'action --}}
            <div class="mt-5 d-flex justify-content-between">
              <a href="{{ route('plans.index') }}" class="btn btn-secondary">Retour au plan</a>
              <button type="submit" class="btn btn-primary px-4">Modifier</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
@endsection
