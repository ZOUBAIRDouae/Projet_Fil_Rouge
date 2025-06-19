 @extends('PlanFormation::layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h5>Ajouter un Brief</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('briefs.store') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Titre</label>
              <input
                type="text"
                name="titre"
                class="form-control"
                id="titre"
                placeholder="Titre du brief"
                required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Description</label>
              <input
                type="text"
                name="description"
                class="form-control"
                id="description"
                placeholder="Description du brief"
                required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Statut</label>
              <input
                type="text"
                name="statut"
                class="form-control"
                id="statut"
                placeholder="Statut du brief"
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
