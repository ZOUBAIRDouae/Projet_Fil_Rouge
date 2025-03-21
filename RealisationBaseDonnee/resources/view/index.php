<!DOCTYPE html>
<html lang="fr">

<?php include_once "view/layouts/heade.php" ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="./view/assets/images/logo.png" alt="" srcset="" width="90px">
            <h4>Planning</h4>
        </div>
        <!-- /.login-logo -->


        <!-- /.login-box-body -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="Responsable@solicode.com" placeholder="Email"
                            class="form-control" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Mot de passe" class="form-control"
                            value="admin">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="./view/dashboard.php" type="submit" class="btn btn-info btn-block">connecter</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>

    </div>
    <!-- /.login-box -->
</body>

<!-- get script -->
<?php include_once "view/layouts/script-link.php"; ?>

</html>