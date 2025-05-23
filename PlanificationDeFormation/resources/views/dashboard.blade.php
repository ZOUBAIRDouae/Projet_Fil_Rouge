@extends('adminlte::page')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
@endsection




@section('title', 'Tableau de Bord')



@section('content_header')
    <h1 class="text-2xl font-bold">Tableau de Bord</h1>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    <!-- Séances -->
    <div class="bg-white shadow rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <i class="fas fa-calendar-alt text-blue-600 text-3xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Séances</h2>
                <ul class="text-sm mt-1">
                    <li>21/04/2024 &nbsp; 09:00 à 12:00</li>
                    <li>22/04/2024 &nbsp; 14:00 à 17:00</li>
                    <li>26/04/2024 &nbsp; 08:30 à 12:00</li>
                </ul>
                <a href="#" class="mt-2 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Voir le planning</a>
            </div>
        </div>
    </div>

    <!-- Brief Projet -->
    <div class="bg-white shadow rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <i class="fas fa-clipboard-list text-blue-600 text-3xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Briefs projet</h2>
                <p class="text-sm">Refonte du site web</p>
                <span class="mt-2 inline-block bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded">En cours</span>
            </div>
        </div>
    </div>

    <!-- Modules -->
    <div class="bg-white shadow rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <i class="fas fa-layer-group text-blue-600 text-3xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Modules</h2>
                <p class="text-2xl font-bold">5</p>
                <a href="#" class="mt-2 inline-block bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">Afficher les modules</a>
            </div>
        </div>
    </div>

    <!-- Formateurs -->
    <div class="bg-white shadow rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <i class="fas fa-user text-blue-600 text-3xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Formateurs</h2>
                <p class="text-2xl font-bold">3</p>
            </div>
        </div>
    </div>

    <!-- Compétences -->
    <div class="bg-white shadow rounded-lg p-5">
        <div class="flex items-center space-x-4">
            <i class="fas fa-check text-blue-600 text-3xl"></i>
            <div>
                <h2 class="text-lg font-semibold">Compétences</h2>
                <p class="text-2xl font-bold">8</p>
            </div>
        </div>
    </div>
</div>
@endsection
