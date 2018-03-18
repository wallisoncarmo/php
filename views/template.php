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
        <!-- Page level plugin CSS-->
        <link href="<?= ROOT_URL ?>assets/vendor/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= ROOT_URL ?>assets/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="<?= ROOT_URL ?>">Arquitetura PHP</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Principal">
                        <a class="nav-link" href="<?= ROOT_URL ?>">
                            <i class="fa fa-fw fa-home"></i>
                            <span class="nav-link-text">Principal</span>
                        </a>
                    </li>                   
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
                        <a class="nav-link" href="<?= ROOT_URL ?>user/">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="nav-link-text">Usuários</span>
                        </a>
                    </li>                   
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfis">
                        <a class="nav-link" href="<?= ROOT_URL ?>profile">
                            <i class="fa fa-fw fa-support"></i>
                            <span class="nav-link-text">Perfis</span>
                        </a>
                    </li>   
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfis">
                        <a class="nav-link" href="<?= ROOT_URL ?>user/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Sair</span>
                        </a>
                    </li>   
                </ul>

               

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a  title="<?= ($_SESSION['user']['username']) ?>" class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user"></i>Bem Vindo,  <?= limitarTexto($_SESSION['user']['username'], 15) ?>
                            <span class="d-lg-none">Configuração</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <a class="dropdown-item small" href="<?= ROOT_URL ?>user/logout">
                                <i class="fa fa-fw fa-sign-out"></i>Sair
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Bootstrap core JavaScript-->
                <script src="<?= ROOT_URL ?>assets/vendor/jquery/jquery.min.js"></script>
                <script src="<?= ROOT_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="<?= ROOT_URL ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Page level plugin JavaScript-->
                <!--<script src="<?= ROOT_URL ?>assets/vendor/chart.js/Chart.min.js"></script>-->

                <script>
                    var ROOT_URL = '<?= ROOT_URL ?>';
                </script>

                <div id="message">
                    <!-- /Mensagens padrões -->
                    <?php Config\Message\Message::display(); ?>
                </div>

                <?php require ($view); ?>

            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Wallison Arquitetura PHP 2018</small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>                 

        </div>
    </body>

</html>
