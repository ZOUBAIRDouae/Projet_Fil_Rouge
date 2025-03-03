<!DOCTYPE html>
<html lang="fr">

<?php include_once "./layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "./layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "./layouts/aside.php" ?>

        <div class="content-wrapper pt-4">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tableau de bord</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>2</h3>
                                    <p>Planning</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-check"></i> 
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="../Formatin/planning/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>28</h3>
                                    <p>Sessions</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div> 
                                <a href="../Formation/formation.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>10</h3>
                                    <p>Les examens</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <a href="./utilisateurs/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Nombre de Sessions</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="sessionChart" style="height: 100px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails des Examens</h3>
                            </div>
                        <div class="card-body">
                            <canvas id="examDateChart" style="height: 250px;"></canvas>
                        </div>
                    </div>
                </div>
                </div>
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Répartition des Sujets</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="subjectChart" style="height: 100px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

</body>

<!-- get script -->
<?php include_once "./layouts/script-link.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var sessionChart = document.getElementById('sessionChart').getContext('2d');
    var sessionChartInstance = new Chart(sessionChart, {
        type: 'bar',
        data: {
            labels: ['Session 1', 'Session 2', 'Session 3'],
            datasets: [{
                label: 'Nombre de Semaine',
                data: [5, 8, 7],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                borderColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });

    var subjectChart = document.getElementById('subjectChart').getContext('2d');
    var subjectChartInstance = new Chart(subjectChart, {
        type: 'pie',
        data: {
            labels: ['SAS', 'Fil Rouge', 'Laravel'],
            datasets: [{
                data: [15, 10, 5],
                backgroundColor: ['#1cc88a', '#4e73df', '#36b9cc']
            }]
        }
    });


    var examDateChart = document.getElementById('examDateChart').getContext('2d');
   var examDateChartInstance = new Chart(examDateChart, {
    type: 'bar', 
    data: {
        labels: ['10 Janvier', '12 Janvier', '15 Janvier'], 
        datasets: [{
            label: 'Taux de Réussite (%)',
            data: [85, 60, 0], 
            backgroundColor: ['#e74a3b', '#50c878', '#e74a3b'], 
            borderColor: ['#e74a3b', '#50c878', '#e74a3b'], 
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            tooltip: {
                enabled: true
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Dates des Examens'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Taux de Réussite (%)'
                }
            }
        }
    }
});


    

</script>

</html>
