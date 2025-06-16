@extends('layouts.admin')

@section('content')
<div class="container ">
  <h1>Gestion des Modules</h1>
  <div class="card">
      <div class="card-header d-flex pb-0 pt-3">
      <!-- input search --> 
      <form method="GET" action="{{ route('modules.index') }}" class="d-flex mb-3 ">
                    <div class="form-group  ">
                        <input type="text" name="search" id="search" class="form-control " value="{{ request('search') }}" placeholder="Rechercher un module">
                    </div>
                    <div class="form-group  ">
                    <button type="submit" class="btn btn-primary mx-3">Rechercher</button>
                    </div>
                </form>
      </div>
    <div class="d-flex justify-content-between mx-3 mt-3">
     <h3 class="card-title my-0">Liste des Modules</h3>
     <a href="{{route('modules.create')}}" class="btn btn-success">Ajouter un module</a>  
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}
    </div> 
        @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($modules as $module)
                <tr>
                  <td>{{ $module->id }}</td>
                  <td>{{ $module->nom }}</td>
                  <td>{{ $module->description }}</td>
                  <td>
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
          {{ $modules->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
