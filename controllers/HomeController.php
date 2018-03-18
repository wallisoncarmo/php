<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace controllers;

use controllers\AbstractController;
use models\UsersModel;
use models\ProfilesModel;
use config\message\Message;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class HomeController extends AbstractController {

    /**
     * Tela inicial da Home
     */
    protected function index() {
        $res = array();

        $usermodel = new UsersModel();
        $profilemodel = new ProfilesModel();


        // parametro de busca
        $parm = ['profile_id' => ['type' => '=', 'value' => 1]];

        $qtd_admin = $usermodel->count($parm);         
        $qtd_user = $usermodel->count();
        $qtd_profile = $profilemodel->count();

        $res['user'] = $qtd_user['data']["value"];
        $res['admin'] = $qtd_admin['data']["value"];
        $res['profile'] = $qtd_profile['data']["value"];

        $this->returnView($res, true);
    }

}
