 @extends('PlanFormation::layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
          <h5>Modifier votre plan</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('plans.update', $plan->id) }}">
            @method('PUT')
            @csrf
            {{-- Module --}}
            <div class="mb-3">
              <label for="modules" class="form-label">Module</label>
              <select
                name="modules[]"
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
                multiple required>
                @foreach($briefs as $brief)
                  <option value="{{ $brief->id }}">
                    {{ $brief->titre }}
                  </option>
                @endforeach
              </select>
            </div>
            {{-- Competences (Multi-Select Dropdown) --}}
            <div class="mb-3">
              <label for="competence" class="form-label">Compétences</label>
              <select
                name="competences[]"
                id="competence"
                class="form-select"
                multiple required>
                @foreach($competences as $competence)
                  <option value="{{ $competence->id }}">
                    {{ $competence->nom }}
                  </option>
                @endforeach
              </select>
            </div>
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
