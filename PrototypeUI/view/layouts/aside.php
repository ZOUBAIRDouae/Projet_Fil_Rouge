<?php
$current_route = $_SERVER['REQUEST_URI'];
?>

<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">
    <!-- Logo de la marque -->
    <a href="/view/home.php" class="brand-link">
        <img src="/view/assets/images/logo.png" class="brand-image img-circle elevation-3" alt="Image de groupe">
        <span class="brand-text font-weight-light text-center h6">Planning de Formation</span>
    </a>

    <!-- Barre latérale -->
    <div class="sidebar">
        <!-- Menu latéral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/view/dashboard.php"
                        class="nav-link <?php echo (strpos($current_route, 'dashboard') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-fas fa-chart-bar"></i>
                        <p>
                            Tableau de bord
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/view/Formation/planning/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'projets') !== false) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Plan
                        </p>
                    </a>
                </li>
 


            

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>