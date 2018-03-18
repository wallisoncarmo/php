<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace controllers;

use controllers\AbstractController;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class ErrorController extends abstractcontroller {

    /**
     * Exibe a view de erros para páginas não encontrada
     */
    protected function notfound() {
        $this->returnView([], false);
    }

}
