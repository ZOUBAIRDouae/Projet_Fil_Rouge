@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <form method="GET" action="{{ route('plans.index') }}" class="d-flex">
                        <input type="text" name="search" id="search" class="form-control" 
                            value="{{ request('search') }}" placeholder="{{ __('PlanFormation::message.Search') }}">
                        <button type="submit" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form method="GET" action="{{ route('plans.index') }}" class="d-flex justify-content-end">
                        <select name="module" class="form-select me-2" style="max-width: 180px;">
                            <option value="">{{ __('PlanFormation::message.all modules') }}</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}" {{ request('module') == $module->id ? 'selected' : '' }}>
                                    {{ $module->nom }}
                                </option>
                            @endforeach
                        </select>

                        <select name="brief" class="form-select me-2" style="max-width: 180px;">
                            <option value="">{{ __('PlanFormation::message.all briefs') }}</option>
                            @foreach($briefs as $brief)
                                <option value="{{ $brief->id }}" {{ request('brief') == $brief->id ? 'selected' : '' }}>
                                    {{ $brief->titre }}
                                </option>
                            @endforeach
                        </select>

                        <select name="competence" class="form-select me-2" style="max-width: 180px;">
                            <option value="">{{ __('PlanFormation::message.all competences') }}</option>
                            @foreach($competences as $competence)
                                <option value="{{ $competence->id }}" {{ request('competence') == $competence->id ? 'selected' : '' }}>
                                    {{ $competence->nom }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-filter"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">{{ __('PlanFormation::message.Training plan') }}</h5>
                <div class="d-flex flex-wrap gap-2 justify-content-end align-items-center">

                    <!-- Export CSV (Icon Only) -->
                    <a href="{{ route('plan.export', ['format' => 'csv']) }}" class="btn btn-outline-info" title="Exporter CSV">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                
                    <!-- Import Form (Icon Only) -->
                    <form action="{{ route('plans.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                        @csrf
                        <label for="import-file" class="btn btn-warning mb-0" title="Importer un fichier">
                            <i class="fas fa-arrow-up"></i>
                        </label>
                        <input id="import-file" type="file" name="file" class="d-none" onchange="this.form.submit()" required>
                    </form>
                
                    <!-- Add Plan (Keep Icon + Text for clarity) -->
                    <a href="{{ route('plans.create') }}" class="btn btn-success d-flex align-items-center">
                        <i class="fas fa-plus me-2"></i> {{ __('PlanFormation::message.Add plan') }}
                    </a>
                </div>                
            </div>
            <table class="table table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>{{ __('PlanFormation::message.Module') }}</th>
                        <th>{{ __('PlanFormation::message.Project Brief') }}</th>
                        <th>{{ __('PlanFormation::message.Skills') }}</th>
                        <th>{{ __('PlanFormation::message.Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                    @if(
                        (empty(request('module')) || ($plan->module && $plan->module->id == request('module'))) &&
                        ($plan->briefProjets->pluck('id')->contains(request('brief')) || !request('brief')) &&
                        ($plan->competences->pluck('id')->contains(request('competence')) || !request('competence')) &&
                        (
                            ($plan->module && strpos($plan->module->nom, request('search')) !== false) || 
                            (strpos($plan->filiere ?? '', request('search')) !== false) || 
                            !request('search')
                        )
                    )
                        <tr>
                            <td>{{ $plan->id }}</td>
                            {{-- <td class="text-start">{{ $plan->filiere }}</td> --}}
                            <td>
                                @foreach($plan->modules as $module)
                                    {{ $module->nom }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($plan->briefProjets as $brief)
                                    {{ $brief->titre }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($plan->competences as $competence)
                                    {{ $competence->nom }}@if(!$loop->last), @endif
                                @endforeach
                            </td>                            
                            {{-- <td>{{ $plan->created_at->format('d/m/Y') }}</td> --}}
                            <td>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-outline-secondary btn-sm" title="{{ __('PlanFormation::message.display') }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('update', $plan)
                                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-outline-primary btn-sm" title="{{ __('PlanFormation::message.edit') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('delete', $plan)
                                    <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="{{ __('PlanFormation::message.delete') }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $plans->links() }}
            </div>
        </div>
    </div>
</div>
@stop
