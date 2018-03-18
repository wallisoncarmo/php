<?php

define("ROOT_PATH", "/");
define("MY_DRIVER", "mysql");

// verifica em qual ambiente está
if ($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "127.0.0.1") {  
    
    //CONFIGURAÇÃO DO AMBIENTE DE LOCAL    
    define("ROOT_URL", "http://" . $_SERVER["HTTP_HOST"] . "/php/");

    // DEFINIÇÃO DO BANDO DE DADOS
    define("MY_DB_HOST", "127.0.0.1");
    define("MY_DB_NAME", "db_php");
    define("MY_DB_USER", "root");
    define("MY_DB_PASS", "root");
} else {
    
    //CONFIGURAÇÃO DO AMBIENTE DE PRODUÇÃO   
    define("ROOT_URL", "http://" . $_SERVER["SERVER_NAME"] . "/");

    // DEFINIÇÃO DO BANDO DE DADOS
    define("MY_DB_HOST", "127.0.0.1");
    define("MY_DB_NAME", "db_php");
    define("MY_DB_USER", "root");
    define("MY_DB_PASS", "root");
}

