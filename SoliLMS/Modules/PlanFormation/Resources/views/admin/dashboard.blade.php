 @extends('PlanFormation::layouts.admin')

 @section('content')
     <div class="app-content-wrapper">
         <div class="container-fluid">
             {{-- Dashboard cards row --}}
             <div class="row g-4 mb-5 dashboard-cards">
                 <div class="col-lg-3 col-md-6">
                     <div class="dashboard-card dashboard-card-primary" data-aos="fade-up" data-aos-delay="100">
                         <div class="dashboard-card-inner">
                             <div class="dashboard-card-icon">
                                 <i class="fas fa-cubes fa-2x"></i>
                             </div>
                             <div class="dashboard-card-content">
                                 <h3 class="dashboard-card-value">{{ number_format($nbModules) }}</h3>
                                 <p class="dashboard-card-label">Total Modules</p>
                             </div>
                         </div>
                         <a href="{{ route('modules.index') }}" class="dashboard-card-link">
                             Voir Modules <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="dashboard-card dashboard-card-success" data-aos="fade-up" data-aos-delay="200">
                         <div class="dashboard-card-inner">
                             <div class="dashboard-card-icon">
                                 <i class="fas fa-chalkboard-teacher fa-2x"></i>
                             </div>
                             <div class="dashboard-card-content">
                                 <h3 class="dashboard-card-value">{{ number_format($nbFormateurs) }}</h3>
                                 <p class="dashboard-card-label">Total Formateurs</p>
                             </div>
                         </div>
                         <a href="{{ route('formateurs.index') }}" class="dashboard-card-link">
                             Voir Formateurs <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="dashboard-card dashboard-card-warning" data-aos="fade-up" data-aos-delay="300">
                         <div class="dashboard-card-inner">
                             <div class="dashboard-card-icon">
                                 <i class="fas fa-tasks fa-2x"></i>
                             </div>
                             <div class="dashboard-card-content">
                                 <h3 class="dashboard-card-value">{{ number_format($nbCompetences) }}</h3>
                                 <p class="dashboard-card-label">Total Compétences</p>
                             </div>
                         </div>
                         <a href="{{ route('competences.index') }}" class="dashboard-card-link">
                             Voir Compétences <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="dashboard-card dashboard-card-info" data-aos="fade-up" data-aos-delay="400">
                         <div class="dashboard-card-inner">
                             <div class="dashboard-card-icon">
                                 <i class="fas fa-file-alt fa-2x"></i>
                             </div>
                             <div class="dashboard-card-content">
                                 <h3 class="dashboard-card-value">{{ number_format($nbBriefs) }}</h3>
                                 <p class="dashboard-card-label">Total Briefs</p>
                             </div>
                         </div>
                         <a href="{{ route('briefs.index') }}" class="dashboard-card-link">
                             Voir Briefs <i class="fas fa-arrow-circle-right"></i>
                         </a>
                     </div>
                 </div>
             </div>

             {{-- First Row of Charts --}}
             <div class="row g-4 mb-5">
                 <div class="col-lg-6">
                     <div class="chart-container" data-aos="fade-right" data-aos-delay="100">
                         <div class="chart-header">
                             <h4 class="chart-title">
                                 <i class="fas fa-chart-bar me-2"></i>Briefs par Module
                             </h4>
                             <div class="chart-actions">
                                 <button class="btn-chart-action" style="opacity: 0;" id="barChartFullscreen">
                                     <i class="fas fa-expand"></i>
                                 </button>
                                 <button class="btn-chart-action" id="barChartDownload">
                                     <i class="fas fa-download"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="chart-body">
                             <canvas id="barChart" height="300"></canvas>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-6">
                     <div class="chart-container" data-aos="fade-left" data-aos-delay="200">
                         <div class="chart-header">
                             <h4 class="chart-title">
                                 <i class="fas fa-chart-line me-2"></i>Évolution du Système
                             </h4>
                             <div class="chart-actions">
                                 <button class="btn-chart-action" style="opacity: 0;" id="lineChartFullscreen">
                                     <i class="fas fa-expand"></i>
                                 </button>
                                 <button class="btn-chart-action" id="lineChartDownload">
                                     <i class="fas fa-download"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="chart-body">
                             <canvas id="lineChart" height="300"></canvas>
                         </div>
                     </div>
                 </div>
             </div>

             {{-- Second Row of Charts --}}
             <div class="row g-4 mb-5">
                 <div class="col-lg-6">
                     <div class="chart-container" data-aos="fade-right" data-aos-delay="300">
                         <div class="chart-header">
                             <h4 class="chart-title">
                                 <i class="fas fa-chart-pie me-2"></i>Compétences par Module
                             </h4>
                             <div class="chart-actions">
                                 <button class="btn-chart-action" style="opacity: 0;" id="doughnutChartFullscreen">
                                     <i class="fas fa-expand"></i>
                                 </button>
                                 <button class="btn-chart-action" id="doughnutChartDownload">
                                     <i class="fas fa-download"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="chart-body">
                             <canvas id="doughnutChart" height="300"></canvas>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-6">
                     <div class="chart-container" data-aos="fade-left" data-aos-delay="400">
                         <div class="chart-header">
                             <h4 class="chart-title">
                                 <i class="fas fa-chart-donut me-2"></i>Vue d'ensemble
                             </h4>
                             <div class="chart-actions">
                                 <button class="btn-chart-action" style="opacity: 0;" id="pieChartFullscreen">
                                     <i class="fas fa-expand"></i>
                                 </button>
                                 <button class="btn-chart-action" id="pieChartDownload">
                                     <i class="fas fa-download"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="chart-body">
                             <canvas id="pieChart" height="300"></canvas>
                         </div>
                     </div>
                 </div>
             </div>

             {{-- Modal for fullscreen charts --}}
             <div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog modal-fullscreen">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="chartModalLabel">Graphique</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body d-flex align-items-center justify-content-center">
                             <canvas id="modalChart" style="width: 100%; height: 80vh;"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <style>
         /* Dashboard Cards */
         .dashboard-cards {
             margin-bottom: 2rem;
         }

         .dashboard-card {
             position: relative;
             border-radius: 16px;
             overflow: hidden;
             box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
             transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
             height: 100%;
             background: white;
             border: 1px solid #e5e7eb;
         }

         .dashboard-card:hover {
             transform: translateY(-8px);
             box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
         }

         .dashboard-card-inner {
             padding: 1.75rem;
             display: flex;
             align-items: center;
         }

         .dashboard-card-icon {
             width: 64px;
             height: 64px;
             border-radius: 12px;
             display: flex;
             align-items: center;
             justify-content: center;
             margin-right: 1.5rem;
             flex-shrink: 0;
             transition: all 0.3s ease;
         }

         .dashboard-card:hover .dashboard-card-icon {
             transform: scale(1.1) rotate(5deg);
         }

         .dashboard-card-primary .dashboard-card-icon {
             background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(79, 70, 229, 0.2));
             color: #6366f1;
         }

         .dashboard-card-success .dashboard-card-icon {
             background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2));
             color: #10b981;
         }

         .dashboard-card-warning .dashboard-card-icon {
             background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(217, 119, 6, 0.2));
             color: #f59e0b;
         }

         .dashboard-card-info .dashboard-card-icon {
             background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.2));
             color: #3b82f6;
         }

         .dashboard-card-content {
             flex-grow: 1;
         }

         .dashboard-card-value {
             font-size: 2rem;
             font-weight: 800;
             color: #1f2937;
             margin: 0 0 0.25rem;
             transition: all 0.3s ease;
         }

         .dashboard-card:hover .dashboard-card-value {
             transform: scale(1.05);
         }

         .dashboard-card-label {
             font-size: 1rem;
             color: #6b7280;
             margin: 0;
             font-weight: 500;
         }

         .dashboard-card-link {
             display: block;
             padding: 0.75rem 1.5rem;
             text-align: center;
             text-decoration: none;
             font-weight: 600;
             transition: all 0.3s ease;
             border-top: 1px solid #e5e7eb;
         }

         .dashboard-card-primary .dashboard-card-link {
             background: rgba(99, 102, 241, 0.1);
             color: #6366f1;
         }

         .dashboard-card-success .dashboard-card-link {
             background: rgba(16, 185, 129, 0.1);
             color: #10b981;
         }

         .dashboard-card-warning .dashboard-card-link {
             background: rgba(245, 158, 11, 0.1);
             color: #f59e0b;
         }

         .dashboard-card-info .dashboard-card-link {
             background: rgba(59, 130, 246, 0.1);
             color: #3b82f6;
         }

         .dashboard-card-link:hover {
             background: linear-gradient(135deg, #6366f1, #8b5cf6);
             color: white !important;
         }

         .dashboard-card-link i {
             margin-left: 0.5rem;
             transition: transform 0.3s ease;
         }

         .dashboard-card-link:hover i {
             transform: translateX(4px);
         }

         /* Chart Containers */
         .chart-container {
             background: white;
             border-radius: 16px;
             box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
             overflow: hidden;
             transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
             height: 100%;
             border: 1px solid #e5e7eb;
         }

         .chart-container:hover {
             box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
             transform: translateY(-5px);
         }

         .chart-header {
             display: flex;
             justify-content: space-between;
             align-items: center;
             padding: 1.25rem 1.5rem;
             border-bottom: 1px solid #e5e7eb;
         }

         .chart-title {
             margin: 0;
             font-size: 1.1rem;
             font-weight: 700;
             color: #1f2937;
             display: flex;
             align-items: center;
         }

         .chart-title i {
             margin-right: 0.5rem;
             color: #6366f1;
         }

         .chart-actions {
             display: flex;
             gap: 0.5rem;
         }

         .btn-chart-action {
             width: 32px;
             height: 32px;
             border-radius: 8px;
             display: flex;
             align-items: center;
             justify-content: center;
             background: #f9fafb;
             color: #6b7280;
             border: 1px solid #e5e7eb;
             cursor: pointer;
             transition: all 0.3s ease;
         }

         .btn-chart-action:hover {
             background: #6366f1;
             color: white;
             transform: translateY(-2px);
         }

         .chart-body {
             padding: 1.5rem;
             position: relative;
         }

         .app-content-wrapper {
             padding: 2rem;
         }

         @media (max-width: 768px) {
             .app-content-wrapper {
                 padding: 1rem;
             }

             .dashboard-card-inner {
                 flex-direction: column;
                 text-align: center;
             }

             .dashboard-card-content {
                 text-align: center;
                 margin-top: 15px;
             }

             .chart-header {
                 flex-direction: column;
                 gap: 15px;
             }
         }
     </style>

     <!-- Chart.js and AOS -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             // Initialize AOS animations
             AOS.init({
                 duration: 800,
                 easing: 'ease-in-out',
                 once: true
             });

             // Get data from Laravel backend
             const nbModules = @json($nbModules);
             const nbFormateurs = @json($nbFormateurs);
             const nbCompetences = @json($nbCompetences);
             const nbBriefs = @json($nbBriefs);
             const chartData = @json($chartData);

             console.log('Dashboard data loaded:', {
                 nbModules,
                 nbFormateurs,
                 nbCompetences,
                 nbBriefs,
                 chartData
             });

             // Chart colors
             const colors = {
                 primary: '#6366f1',
                 success: '#10b981',
                 warning: '#f59e0b',
                 info: '#3b82f6',
                 danger: '#ef4444',
                 purple: '#8b5cf6',
                 pink: '#ec4899',
                 green: '#22c55e'
             };

             // Chart configuration
             const chartConfig = {
                 responsive: true,
                 maintainAspectRatio: false,
                 plugins: {
                     legend: {
                         position: 'top',
                         labels: {
                             usePointStyle: true,
                             padding: 20,
                             font: {
                                 family: "'Inter', sans-serif",
                                 weight: 600,
                                 size: 12
                             }
                         }
                     },
                     tooltip: {
                         backgroundColor: 'rgba(0,0,0,0.9)',
                         titleColor: 'white',
                         bodyColor: 'white',
                         borderColor: colors.primary,
                         borderWidth: 2,
                         cornerRadius: 10,
                         padding: 15
                     }
                 },
                 animation: {
                     duration: 2000,
                     easing: 'easeOutQuart'
                 }
             };

             // 1. Bar Chart - Briefs par Module
             const ctxBar = document.getElementById('barChart');
             if (ctxBar) {
                 // Prepare data with fallbacks
                 let barLabels = [];
                 let barData = [];

                 if (chartData && chartData.modulesParBrief && chartData.modulesParBrief.labels && chartData
                     .modulesParBrief.labels.length > 0) {
                     barLabels = chartData.modulesParBrief.labels.slice(0, 10);
                     barData = chartData.modulesParBrief.data.slice(0, 10);
                 } else {
                     // Fallback data
                     barLabels = [
                         'Module Web Dev',
                         'Module Mobile',
                         'Module Database',
                         'Module UI/UX',
                         'Module DevOps'
                     ];
                     barData = [
                         Math.max(1, Math.floor(nbBriefs * 0.3)),
                         Math.max(1, Math.floor(nbBriefs * 0.25)),
                         Math.max(1, Math.floor(nbBriefs * 0.2)),
                         Math.max(1, Math.floor(nbBriefs * 0.15)),
                         Math.max(1, Math.floor(nbBriefs * 0.1))
                     ];
                 }

                 const barChart = new Chart(ctxBar, {
                     type: 'bar',
                     data: {
                         labels: barLabels,
                         datasets: [{
                             label: 'Nombre de Briefs',
                             data: barData,
                             backgroundColor: 'rgba(99, 102, 241, 0.8)',
                             borderColor: colors.primary,
                             borderWidth: 2,
                             borderRadius: 8,
                             borderSkipped: false,
                             hoverBackgroundColor: 'rgba(99, 102, 241, 0.9)',
                             hoverBorderColor: colors.primary,
                             hoverBorderWidth: 3
                         }]
                     },
                     options: {
                         ...chartConfig,
                         scales: {
                             y: {
                                 beginAtZero: true,
                                 grid: {
                                     color: 'rgba(0,0,0,0.1)',
                                     drawBorder: false
                                 },
                                 ticks: {
                                     stepSize: 1,
                                     callback: function(value) {
                                         return Number.isInteger(value) ? value : '';
                                     },
                                     font: {
                                         family: "'Inter', sans-serif"
                                     }
                                 }
                             },
                             x: {
                                 grid: {
                                     display: false
                                 },
                                 ticks: {
                                     maxRotation: 45,
                                     font: {
                                         family: "'Inter', sans-serif"
                                     }
                                 }
                             }
                         },
                         plugins: {
                             ...chartConfig.plugins,
                             tooltip: {
                                 ...chartConfig.plugins.tooltip,
                                 callbacks: {
                                     label: function(context) {
                                         return `${context.dataset.label}: ${context.parsed.y} briefs`;
                                     }
                                 }
                             }
                         }
                     }
                 });

                 window.barChartInstance = barChart;
             }

             // 2. Line Chart - Évolution du Système
             const ctxLine = document.getElementById('lineChart');
             if (ctxLine) {
                 // Prepare evolution data
                 let months = [];
                 let modulesData = [];
                 let briefsData = [];
                 let competencesData = [];
                 let formateursData = [];

                 if (chartData && chartData.monthlyGrowth && chartData.monthlyGrowth.length > 0) {
                     months = chartData.monthlyGrowth.map(item => item.month);
                     modulesData = chartData.monthlyGrowth.map(item => item.modules || 0);
                     briefsData = chartData.monthlyGrowth.map(item => item.briefs || 0);
                     competencesData = chartData.monthlyGrowth.map(item => item.competences || 0);
                     formateursData = chartData.monthlyGrowth.map(item => item.formateurs || 0);
                 } else {
                     // Fallback data
                     months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'];
                     modulesData = months.map((_, index) => Math.max(1, Math.floor(nbModules * (0.6 + index *
                         0.08))));
                     briefsData = months.map((_, index) => Math.max(1, Math.floor(nbBriefs * (0.5 + index * 0.1))));
                     competencesData = months.map((_, index) => Math.max(1, Math.floor(nbCompetences * (0.7 + index *
                         0.05))));
                     formateursData = months.map((_, index) => Math.max(1, Math.floor(nbFormateurs * (0.8 + index *
                         0.03))));
                 }

                 const lineChart = new Chart(ctxLine, {
                     type: 'line',
                     data: {
                         labels: months,
                         datasets: [{
                             label: 'Modules',
                             data: modulesData,
                             borderColor: colors.primary,
                             backgroundColor: colors.primary + '20',
                             fill: true,
                             tension: 0.4,
                             pointRadius: 6,
                             pointHoverRadius: 8,
                             pointBackgroundColor: colors.primary,
                             pointBorderColor: '#fff',
                             pointBorderWidth: 2,
                             borderWidth: 3
                         }, {
                             label: 'Briefs',
                             data: briefsData,
                             borderColor: colors.success,
                             backgroundColor: colors.success + '20',
                             fill: true,
                             tension: 0.4,
                             pointRadius: 6,
                             pointHoverRadius: 8,
                             pointBackgroundColor: colors.success,
                             pointBorderColor: '#fff',
                             pointBorderWidth: 2,
                             borderWidth: 3
                         }, {
                             label: 'Compétences',
                             data: competencesData,
                             borderColor: colors.warning,
                             backgroundColor: colors.warning + '20',
                             fill: true,
                             tension: 0.4,
                             pointRadius: 6,
                             pointHoverRadius: 8,
                             pointBackgroundColor: colors.warning,
                             pointBorderColor: '#fff',
                             pointBorderWidth: 2,
                             borderWidth: 3
                         }, {
                             label: 'Formateurs',
                             data: formateursData,
                             borderColor: colors.info,
                             backgroundColor: colors.info + '20',
                             fill: true,
                             tension: 0.4,
                             pointRadius: 6,
                             pointHoverRadius: 8,
                             pointBackgroundColor: colors.info,
                             pointBorderColor: '#fff',
                             pointBorderWidth: 2,
                             borderWidth: 3
                         }]
                     },
                     options: {
                         ...chartConfig,
                         scales: {
                             y: {
                                 beginAtZero: true,
                                 grid: {
                                     color: 'rgba(0,0,0,0.1)',
                                     drawBorder: false
                                 },
                                 ticks: {
                                     font: {
                                         family: "'Inter', sans-serif"
                                     }
                                 }
                             },
                             x: {
                                 grid: {
                                     color: 'rgba(0,0,0,0.05)'
                                 },
                                 ticks: {
                                     font: {
                                         family: "'Inter', sans-serif"
                                     }
                                 }
                             }
                         },
                         interaction: {
                             intersect: false,
                             mode: 'index'
                         }
                     }
                 });

                 window.lineChartInstance = lineChart;
             }

             // 3. Doughnut Chart - Compétences par Module (Enhanced)
             const ctxDoughnut = document.getElementById('doughnutChart');
             if (ctxDoughnut) {
                 // Prepare data with fallbacks
                 let doughnutLabels = [];
                 let doughnutData = [];

                 if (chartData && chartData.competencesParModule && chartData.competencesParModule.labels &&
                     chartData.competencesParModule.labels.length > 0) {
                     doughnutLabels = chartData.competencesParModule.labels.slice(0, 8);
                     doughnutData = chartData.competencesParModule.data.slice(0, 8);
                 } else {
                     // Fallback data
                     doughnutLabels = [
                         'Module Web Development',
                         'Module Mobile App',
                         'Module Database',
                         'Module UI/UX Design',
                         'Module DevOps',
                         'Module Security'
                     ];
                     doughnutData = [
                         Math.max(1, Math.floor(nbCompetences * 0.25)),
                         Math.max(1, Math.floor(nbCompetences * 0.20)),
                         Math.max(1, Math.floor(nbCompetences * 0.18)),
                         Math.max(1, Math.floor(nbCompetences * 0.15)),
                         Math.max(1, Math.floor(nbCompetences * 0.12)),
                         Math.max(1, Math.floor(nbCompetences * 0.10))
                     ];
                 }

                 // Ensure we have data to display
                 if (doughnutData.every(val => val === 0)) {
                     doughnutData = [5, 4, 3, 2, 2, 1];
                 }

                 const doughnutChart = new Chart(ctxDoughnut, {
                     type: 'doughnut',
                     data: {
                         labels: doughnutLabels,
                         datasets: [{
                             label: 'Compétences',
                             data: doughnutData,
                             backgroundColor: [
                                 'rgba(99, 102, 241, 0.8)',
                                 'rgba(16, 185, 129, 0.8)',
                                 'rgba(245, 158, 11, 0.8)',
                                 'rgba(59, 130, 246, 0.8)',
                                 'rgba(239, 68, 68, 0.8)',
                                 'rgba(139, 92, 246, 0.8)',
                                 'rgba(236, 72, 153, 0.8)',
                                 'rgba(34, 197, 94, 0.8)'
                             ],
                             borderColor: [
                                 colors.primary,
                                 colors.success,
                                 colors.warning,
                                 colors.info,
                                 colors.danger,
                                 colors.purple,
                                 colors.pink,
                                 colors.green
                             ],
                             borderWidth: 3,
                             hoverOffset: 15,
                             hoverBorderWidth: 4
                         }]
                     },
                     options: {
                         responsive: true,
                         maintainAspectRatio: false,
                         cutout: '60%',
                         plugins: {
                             legend: {
                                 position: 'right',
                                 align: 'center',
                                 labels: {
                                     usePointStyle: true,
                                     pointStyle: 'circle',
                                     padding: 15,
                                     font: {
                                         family: "'Inter', sans-serif",
                                         weight: 600,
                                         size: 11
                                     },
                                     generateLabels: function(chart) {
                                         const data = chart.data;
                                         if (data.labels.length && data.datasets.length) {
                                             return data.labels.map((label, i) => {
                                                 const dataset = data.datasets[0];
                                                 const value = dataset.data[i];
                                                 const total = dataset.data.reduce((a, b) => a +
                                                     b, 0);
                                                 const percentage = ((value / total) * 100)
                                                     .toFixed(1);

                                                 return {
                                                     text: `${label} (${percentage}%)`,
                                                     fillStyle: dataset.backgroundColor[i],
                                                     strokeStyle: dataset.borderColor[i],
                                                     lineWidth: dataset.borderWidth,
                                                     hidden: false,
                                                     index: i
                                                 };
                                             });
                                         }
                                         return [];
                                     }
                                 }
                             },
                             tooltip: {
                                 backgroundColor: 'rgba(0,0,0,0.9)',
                                 titleColor: 'white',
                                 bodyColor: 'white',
                                 borderColor: colors.primary,
                                 borderWidth: 2,
                                 cornerRadius: 10,
                                 padding: 15,
                                 displayColors: true,
                                 callbacks: {
                                     label: function(context) {
                                         const label = context.label || '';
                                         const value = context.parsed;
                                         const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                         const percentage = ((value / total) * 100).toFixed(1);
                                         return `${label}: ${value} compétences (${percentage}%)`;
                                     }
                                 }
                             }
                         },
                         animation: {
                             animateRotate: true,
                             animateScale: true,
                             duration: 2000,
                             easing: 'easeOutQuart'
                         },
                         interaction: {
                             intersect: false
                         }
                     }
                 });

                 window.doughnutChartInstance = doughnutChart;

                 console.log('Doughnut chart initialized with data:', {
                     labels: doughnutLabels,
                     data: doughnutData,
                     total: doughnutData.reduce((a, b) => a + b, 0)
                 });
             }

             // 4. Pie Chart - Vue d'ensemble
             const ctxPie = document.getElementById('pieChart');
             if (ctxPie) {
                 const pieChart = new Chart(ctxPie, {
                     type: 'pie',
                     data: {
                         labels: ['Modules', 'Formateurs', 'Compétences', 'Briefs'],
                         datasets: [{
                             label: 'Distribution',
                             data: [
                                 Math.max(1, nbModules),
                                 Math.max(1, nbFormateurs),
                                 Math.max(1, nbCompetences),
                                 Math.max(1, nbBriefs)
                             ],
                             backgroundColor: [
                                 'rgba(99, 102, 241, 0.8)',
                                 'rgba(16, 185, 129, 0.8)',
                                 'rgba(245, 158, 11, 0.8)',
                                 'rgba(59, 130, 246, 0.8)'
                             ],
                             borderColor: [
                                 colors.primary,
                                 colors.success,
                                 colors.warning,
                                 colors.info
                             ],
                             borderWidth: 3,
                             hoverOffset: 10,
                             hoverBorderWidth: 4
                         }]
                     },
                     options: {
                         responsive: true,
                         maintainAspectRatio: false,
                         plugins: {
                             legend: {
                                 position: 'bottom',
                                 labels: {
                                     usePointStyle: true,
                                     pointStyle: 'circle',
                                     padding: 20,
                                     font: {
                                         family: "'Inter', sans-serif",
                                         weight: 600,
                                         size: 12
                                     },
                                     generateLabels: function(chart) {
                                         const data = chart.data;
                                         if (data.labels.length && data.datasets.length) {
                                             return data.labels.map((label, i) => {
                                                 const dataset = data.datasets[0];
                                                 const value = dataset.data[i];
                                                 const total = dataset.data.reduce((a, b) => a +
                                                     b, 0);
                                                 const percentage = ((value / total) * 100)
                                                     .toFixed(1);

                                                 return {
                                                     text: `${label}: ${value} (${percentage}%)`,
                                                     fillStyle: dataset.backgroundColor[i],
                                                     strokeStyle: dataset.borderColor[i],
                                                     lineWidth: dataset.borderWidth,
                                                     hidden: false,
                                                     index: i
                                                 };
                                             });
                                         }
                                         return [];
                                     }
                                 }
                             },
                             tooltip: {
                                 backgroundColor: 'rgba(0,0,0,0.9)',
                                 titleColor: 'white',
                                 bodyColor: 'white',
                                 borderColor: colors.primary,
                                 borderWidth: 2,
                                 cornerRadius: 10,
                                 padding: 15,
                                 displayColors: true,
                                 callbacks: {
                                     label: function(context) {
                                         const label = context.label || '';
                                         const value = context.parsed;
                                         const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                         const percentage = ((value / total) * 100).toFixed(1);
                                         return `${label}: ${value} éléments (${percentage}%)`;
                                     }
                                 }
                             }
                         },
                         animation: {
                             animateRotate: true,
                             animateScale: true,
                             duration: 2000,
                             easing: 'easeOutQuart'
                         }
                     }
                 });

                 window.pieChartInstance = pieChart;
             }

             // Store all charts for reference
             const charts = [{
                     id: 'barChart',
                     title: 'Briefs par Module',
                     instance: 'barChartInstance'
                 },
                 {
                     id: 'lineChart',
                     title: 'Évolution du Système',
                     instance: 'lineChartInstance'
                 },
                 {
                     id: 'doughnutChart',
                     title: 'Compétences par Module',
                     instance: 'doughnutChartInstance'
                 },
                 {
                     id: 'pieChart',
                     title: 'Vue d\'ensemble',
                     instance: 'pieChartInstance'
                 }
             ];

             // Handle fullscreen and download functionality

             const chartModal = new bootstrap.Modal(document.getElementById('chartModal'));
             const modalChart = document.getElementById('modalChart');
             let currentModalChart = null;

             charts.forEach(({
                 id,
                 title,
                 instance
             }) => {
                 // Fullscreen functionality
                 const fullscreenBtn = document.getElementById(`${id}Fullscreen`);
                 if (fullscreenBtn) {
                     fullscreenBtn.addEventListener('click', function() {
                         document.getElementById('chartModalLabel').textContent = title;

                         if (currentModalChart) {
                             currentModalChart.destroy();
                         }

                         const originalChart = window[instance];

                         if (originalChart) {
                             const modalConfig = JSON.parse(JSON.stringify(originalChart.config));
                             currentModalChart = new Chart(modalChart, {
                                 type: modalConfig.type,
                                 data: modalConfig.data,
                                 options: {
                                     ...modalConfig.options,
                                     maintainAspectRatio: false,
                                     responsive: true
                                 }
                             });
                         }

                         chartModal.show();
                     });
                 }

                 // Download functionality
                 const downloadBtn = document.getElementById(`${id}Download`);
                 if (downloadBtn) {
                     downloadBtn.addEventListener('click', function() {
                         const canvas = document.getElementById(id);
                         const link = document.createElement('a');
                         link.download =
                             `${title.replace(/\s+/g, '-').toLowerCase()}-${new Date().toISOString().split('T')[0]}.png`;
                         link.href = canvas.toDataURL('image/png');
                         link.click();
                     });
                 }
             });

             // Handle modal close
             document.getElementById('chartModal').addEventListener('hidden.bs.modal', function() {
                 if (currentModalChart) {
                     currentModalChart.destroy();
                     currentModalChart = null;
                 }
             });

             console.log('All charts initialized successfully!');
         });
         // xxxxxxxxx
     </script>
 @endsection
