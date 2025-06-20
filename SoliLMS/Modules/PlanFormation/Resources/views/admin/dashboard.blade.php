@extends('layouts.admin')

@section('title', 'Tableau de Bord')

@section('content_header')
    <h1>Tableau de Bord</h1>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-cubes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Modules</span>
                <span class="info-box-number">{{ $nbModules }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Formateurs</span>
                <span class="info-box-number">{{ $nbFormateurs }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Compétences</span>
                <span class="info-box-number">{{ $nbCompetences }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Briefs Projets</span>
                <span class="info-box-number">{{ $nbBriefs }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Briefs par Module</div>
            <div class="card-body">
                <canvas id="briefsParModuleChart" style="width: 100%; max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Compétences par Module</div>
            <div class="card-body">
                <canvas id="competencesParModuleChart" style="width: 100%; max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const chartData = @json($chartData);
    console.log("chartData:", chartData);

    const briefsCtx = document.getElementById('briefsParModuleChart');
    if (briefsCtx) {
        new Chart(briefsCtx, {
            type: 'bar',
            data: {
                labels: chartData.modulesParBrief.labels,
                datasets: [{
                    label: 'Briefs par Module',
                    data: chartData.modulesParBrief.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const competencesCtx = document.getElementById('competencesParModuleChart');
    if (competencesCtx) {
        new Chart(competencesCtx, {
            type: 'bar',
            data: {
                labels: chartData.competencesParModule.labels,
                datasets: [{
                    label: 'Compétences par Module',
                    data: chartData.competencesParModule.data,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
</script>
@endsection
