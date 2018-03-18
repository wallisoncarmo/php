<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

/**
 * Funções e utilitários
 * @author Wallison do Carmo Costa
 */

/**
 * faz um var_dump
 * @param type $text
 */
function vd($text) {
    var_dump('<pre>', $text);
}

/**
 * faz um var_dump e exit
 * @param type $text
 */
function vde($text) {
    var_dump('<pre>', $text);
    exit();
}

/*
 * Monta um json_encode
 */

function je($je) {
    $json = json_encode($je);
}

/*
 * Monta um json_encode com exit
 */

function jex($je) {
    $json = json_encode($je);
    exit();
}

function removeLast($text) {
    return substr($text, 0, -1);
    ;
}

function timestampToDatePT($timestamp) {
    return date("d/m/Y á\s H:i", $timestamp);
}

function convertDataEN($data) {
    $date = date_create($data);
    return date_format($date, 'd/m/Y H:i:s');
}

/**
 * @author Cah0s https://gist.github.com/marcosbrasil/2965881
 * @param type $texto
 * @param type $limite
 * @param type $quebrar
 * @return string
 */
function limitarTexto($texto, $limite, $quebrar = true) {
    //corta as tags do texto para evitar corte errado
    $contador = strlen(strip_tags($texto));
    if ($contador <= $limite):
        //se o número do texto form menor ou igual o limite então retorna ele mesmo
        $newtext = $texto;
    else:
        if ($quebrar == true): //se for maior e $quebrar for true
            //corta o texto no limite indicado e retira o ultimo espaço branco
            $newtext = trim(mb_substr($texto, 0, $limite)) . "...";
        else:
            //localiza ultimo espaço antes de $limite
            $ultimo_espaço = strrpos(mb_substr($texto, 0, $limite), " ");
            //corta o $texto até a posição lozalizada
            $newtext = trim(mb_substr($texto, 0, $ultimo_espaço)) . "...";
        endif;
    endif;
    return $newtext;
}
