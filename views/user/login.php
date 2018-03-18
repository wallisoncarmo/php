<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Arquitetura Básica em php">
        <meta name="author" content="Wallison do Carmo Costa">
        <link rel="icon" href="<?= ROOT_URL ?>assets/images/logo.png">
        <title>Arquitetura PHP</title>
        <!-- Bootstrap core CSS-->
        <link href="<?= ROOT_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?= ROOT_URL ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?= ROOT_URL ?>assets/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center">Acesso ao Sistema</div>
                <div class="card-body">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuário</label>
                            <input class="form-control" id="username" name="username" type="email" aria-describedby="emailHelp" placeholder="Informe seu E-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input class="form-control" id="password" name="password" type="password" placeholder="Senha de acesso" required>
                        </div>                        
                        <button class="btn btn-primary btn-block" name="submit" type="submit" value="Entrar" >ENTRAR</button>
                    </form>
                    <div class="text-center">
                        <div id="message">
                            <!-- /Mensagens padrões -->
                            <?php config\message\Message::display() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?= ROOT_URL ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= ROOT_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= ROOT_URL ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

</html>
