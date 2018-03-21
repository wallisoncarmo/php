<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace controllers;

use config\Services;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
abstract class AbstractController {

    protected $request;
    protected $action;

    public function __construct($action, $request) {
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction() {
        return $this->{$this->action}();
    }

    /**
     * 
     * @param type $viewmodel objetos que podem ser ultilzados na view
     * @param type $fullview [false]-- para ultilizar o template [true]-- para ultilizar todo o html da pagina 
     */
    protected function returnView($viewmodel, $fullview) {
        // remove parametos desnecessários e  troca a barras
        $view = strtolower(str_replace(['\\', '/controllers', 'Controller', 'controller'], ["/", '', '', ''], 'views/' . get_class($this) . '/' . $this->action . '.php'));

        if ($fullview) {
            require('views/template.php');
        } else {
            require($view);
        }
    }

    /**
     * Monta a resposta do json
     * @param type $data o que irá vir no cabeçalho
     * @param type $code codigo http
     * @param type $url esse campo só é informado caso queria exibir um url do registro inserido
     */
    protected function returnJson($data, $code) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        http_response_code($code);
    }

    /**
     * login dos usuários
     */
    protected function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();
        header("Location: " . ROOT_URL . "user/login");
    }

    /**
     * monta o tipo de erro, caso seja não autorizado ele irá desconectar o usuário
     * @param type $code
     * @return string
     */
    protected function checkCodeResponse($code) {
        // verifica o codigo
        if ($code == 403) {
            $this->logout();
        } else if ($code != 200) {
            return 'error';
        } else {
            return 'success';
        }
    }

    /**
     *  valida se o usuário possui permissao a essa funcionalidade caso n tenha é enviado para pagina de erro
     * @param array $perfil Recebe uma lista de perfil 
     */
    protected function validaPermissao($perfil) {

        // verifica o codigo
        if (!in_array($_SESSION['user']['profile_id'], $perfil)) {
            header('Location: ' . ROOT_URL . 'error/permission');
        }
    }

}
