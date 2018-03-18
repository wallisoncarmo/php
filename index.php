<?php

// start SESSION
session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

require('config/config.php');
require('autoload.php');
require('config/leng/texto_pt.php');

// importa as funcoes publicas
require('util/public_function.php');

// Importa as configurações
use config\Bootstrap;

// Valida se o usuário está logado caso n esteja ele é enviado para a tela de login
if (!isset($_SESSION['is_logged_in']) && $_GET['controller'] . '/' . $_GET['action'] != "user/login")
    header('Location: ' . ROOT_URL . "user/login");
// Inicia o boostrap
$bootstrap = new Bootstrap($_GET);

// cria a controladora da pagina
$controller = $bootstrap->createController();

//Executa a controladora
if ($controller) {
    $controller->executeAction();
}
