@extends('layouts.admin')

@section('content')
<div class="container py-4">
  <h1 class="mb-4 fw-bold text-primary">Gestion types d'evaluations</h1>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="card-title mb-0">Types d'evaluations</h3>
        <a href="{{ route('evaluations.create') }}" class="btn btn-success">
          <i class="fas fa-plus me-1"></i> Ajouter Evaluation
        </a>
      </div>
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
              <th scope="col">Type</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($evaluations as $evaluation)
              <tr>
                <td>{{ $evaluation->id }}</td>
                <td>{{ $evaluation->type }}</td>
                <td class="text-center">
                  <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce type ?');">
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
                <td colspan="4" class="text-center text-muted">Aucune type trouvée.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="d-flex justify-content-center mt-4">
        {{ $evaluations->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
