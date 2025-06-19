 @extends('PlanFormation::layouts.admin')
@section('content')
<div class="container my-4">
  <h1 class="mb-4">Gestion des Briefs</h1>

  <div class="card shadow">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
      <form method="GET" action="{{ route('briefs.index') }}" class="d-flex flex-wrap gap-2 align-items-center">
        <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Rechercher un brief">
        <button type="submit" class="btn btn-primary">Rechercher</button>
      </form>
      <a href="{{ route('briefs.create') }}" class="btn btn-success mt-3 mt-md-0">
        <i class="fas fa-plus-circle me-1"></i> Ajouter un Brief
      </a>
    </div>

    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <table class="table table-hover table-bordered align-middle text-center">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Module</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($briefs as $brief)
          @if(
            (empty(request('module')) || $brief->module->id == request('module'))
          )
            <tr>
              <td>{{ $brief->id }}</td>
              <td>{{ $brief->titre }}</td>
              <td>{{ $brief->description }}</td>
              <td>{{ $brief->statut }}</td>
              <td>{{ $brief->module->nom }}</td>
              <td>
                <form action="{{ route('briefs.destroy', $brief->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger btn-sm" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce brief ?')">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endif
          @empty
            <tr>
              <td colspan="3">Aucun brief trouvé.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="d-flex justify-content-center mt-3">
        {{ $briefs->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
