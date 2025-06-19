 @extends('PlanFormation::layouts.admin')

@section('content')
<div class="container py-4">
  <h1 class="mb-4 fw-bold text-primary">Gestion des Compétences</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="card-title mb-0">Liste des Compétences</h3>
        <a href="{{ route('competences.create') }}" class="btn btn-success">
          <i class="fas fa-plus me-1"></i> Ajouter une compétence
        </a>
      </div>

      <!-- Formulaire de recherche (revu) -->
{{-- <form method="GET" action="{{ route('competences.index') }}" class="row g-2 mb-4 align-items-center">
  <div class="col-md-10">
    <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Rechercher une compétence...">
  </div>
  <div class="col-md-2">
    <button type="submit" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" title="Rechercher">
      <i class="fas fa-search"></i>
    </button>
  </div>
</form> --}}


      <!-- Message de succès -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <!-- Tableau des compétences -->
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Description</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($competences as $competence)
              <tr>
                <td>{{ $competence->id }}</td>
                <td>{{ $competence->nom }}</td>
                <td>{{ $competence->description }}</td>
                <td class="text-center">
                  <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-trash-alt"></i> Supprimer
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center text-muted">Aucune compétence trouvée.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-center mt-4">
        {{ $competences->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
