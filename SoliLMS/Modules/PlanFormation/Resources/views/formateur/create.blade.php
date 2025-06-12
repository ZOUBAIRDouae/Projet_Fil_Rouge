@extends('layouts.admin')

@section('content')
<style>
  /* Container centré */
  .container {
    max-width: 700px;
    margin: 3rem auto;
    padding: 0 1rem;
  }

  /* Card */
  .card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    overflow: hidden;
  }

  .card-header {
    background-color: #28a745; /* vert bootstrap */
    color: white;
    padding: 1rem 1.5rem;
    text-align: center;
    font-weight: 600;
    font-size: 1.25rem;
  }

  .card-body {
    padding: 1.5rem 2rem;
  }

  /* Form groups */
  .mb-3 {
    margin-bottom: 1.5rem;
  }

  label.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #333;
  }

  input.form-control,
  select.form-select {
    width: 100%;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
  }

  input.form-control:focus,
  select.form-select:focus {
    border-color: #28a745;
    outline: none;
    box-shadow: 0 0 6px rgb(40 167 69 / 0.4);
  }

  /* Bouton centré */
  .text-center {
    text-align: center;
  }

  button.btn {
    cursor: pointer;
    border: none;
    padding: 0.6rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 6px;
    transition: background-color 0.3s ease;
  }

  button.btn-success {
    background-color: #28a745;
    color: white;
  }

  button.btn-success:hover,
  button.btn-success:focus {
    background-color: #1e7e34;
  }

  /* Responsive */
  @media (max-width: 600px) {
    .container {
      margin: 2rem 1rem;
      padding: 0;
    }
    .card-body {
      padding: 1rem 1rem;
    }
  }
</style>

<div class="container">
  <div class="card">
    <div class="card-header">
      Ajouter un formateur
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div style="background:#f8d7da; color:#842029; padding:10px; border-radius:5px; margin-bottom:1.5rem;">
          <ul style="margin:0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('formateurs.store') }}">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nom utilisateur :</label>
          <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            value="{{ old('name') }}"
            placeholder="Nom utilisateur"
            required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email :</label>
          <input
            type="email"
            id="email"
            name="email"
            class="form-control"
            value="{{ old('email') }}"
            placeholder="Adresse email"
            required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe :</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="Mot de passe"
            required>
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirmer mot de passe :</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-control"
            placeholder="Confirmer mot de passe"
            required>
        </div>

        <div class="mb-3">
          <label for="nom" class="form-label">Nom :</label>
          <input
            type="text"
            id="nom"
            name="nom"
            class="form-control"
            value="{{ old('nom') }}"
            placeholder="Nom"
            required>
        </div>

        <div class="mb-3">
          <label for="prenom" class="form-label">Prénom :</label>
          <input
            type="text"
            id="prenom"
            name="prenom"
            class="form-control"
            value="{{ old('prenom') }}"
            placeholder="Prénom"
            required>
        </div>

        <div class="mb-3">
          <label for="telephone" class="form-label">Téléphone :</label>
          <input
            type="text"
            id="telephone"
            name="telephone"
            class="form-control"
            value="{{ old('telephone') }}"
            placeholder="Téléphone"
            required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success px-4">Créer formateur</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
