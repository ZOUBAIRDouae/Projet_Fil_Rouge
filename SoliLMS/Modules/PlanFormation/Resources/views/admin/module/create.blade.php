@extends('layouts.admin')

@section('content')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h5>Ajouter un Module</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('modules.store') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="name" placeholder="Nom du module" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Description</label>
              <input type="text" name="description" class="form-control" id="name" placeholder="Description du module" required>
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
