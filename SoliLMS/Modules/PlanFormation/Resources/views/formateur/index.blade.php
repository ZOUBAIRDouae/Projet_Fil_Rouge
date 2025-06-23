@extends('layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
          <h5>Liste des Formateurs</h5>
        </div>

        <div class="card-body">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($formateurs as $formateur)
                <tr>
                  <td>{{ $formateur->id }}</td>
                  <td>{{ $formateur->nom }}</td>
                  <td>{{ $formateur->prenom }}</td>
                  <td>{{ $formateur->user->email }}</td>
                  <td>{{ $formateur->telephone }}</td>
                  <td>
                    <a href="{{ route('formateurs.show', $formateur->id) }}" class="btn btn-sm btn-outline-primary">
                      Consulter
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center">Aucun formateur trouvé.</td>
                </tr>
              @endforelse
            </tbody>
          </table>

          {{-- <div class="text-end">
            <a href="{{ route('formateurs.create') }}" class="btn btn-success">Ajouter un formateur</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
