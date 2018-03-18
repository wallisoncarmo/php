<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace controllers;

use classes\Users;
use classes\Profiles;
use models\UsersModel;
use models\ProfilesModel;
use config\message\Message;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class UserController extends AbstractController {

    protected function index() {
        $res = array();

        $obj = new Users();

        $viewmodel = new UsersModel();
        $result = $viewmodel->findAll($obj);

        if ($result["code"] !== OK_CODE) {
            Message::setmessage($result['msg'], 'error');
        } else {
            $res = $result['data'];
        }

        $this->returnView($res, true);
    }

    protected function form() {
        $res = array();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $id = $this->request['id'];

        if ($post['submit']) {

            // remove o submit
            unset($post['submit']);
            $obj = new Users();
            $objProfile = new Profiles();


            $obj->setUsername(strtolower(trim($post['username'])));
            $obj->setPassword($post['password']);
            $obj->setActive(1);
            $objProfile->setId($post['profile_id']);
            $obj->setProfile($objProfile);

            $viewmodel = new UsersModel();

            // verifica se é PUT ou POST
            if ($id) {
                $obj->setId($id);
                $res = $viewmodel->update($obj);
            } else {
                $res = $viewmodel->add($obj);
            }

            if ($res["code"] !== OK_CODE) {
                Message::setmessage($res['msg'], 'error');
            } else {
                Message::setmessage("O Usuário foi salvo", 'success');                
            }
        }

        if ($id) {

            $viewmodel = new UsersModel();
            $result = $viewmodel->findById($id);

            if ($result["code"] !== OK_CODE) {
                Message::setmessage($result['msg'], 'error');
            } else {
                $res['user'] = $result['data'];
            }
        }

        $viewmodel = new ProfilesModel();
        $result = $viewmodel->findAll(new Profiles());

        if ($result["code"] !== OK_CODE) {
            Message::setmessage($result['msg'], 'error');
        } else {
            $res['profiles'] = $result['data'];
        }

        $this->returnView($res, true);
    }

    /**
     * login dos usuários
     */
    protected function login() {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $res = array();
        // verifica se possui uma requisição post
        if ($post['submit']) {

            // remove o submit
            unset($post['submit']);
            $obj = new Users();

            $obj->setUsername(strtolower(trim($post['username'])));
            $obj->setPassword($post['password']);

            $viewmodel = new UsersModel();
            $res = $viewmodel->login($obj);

            if (is_array($res)) {

                $_SESSION['is_logged_in'] = true;
                $_SESSION['user'] = [
                    'username' => $post["username"],
                    'profile_id' => $res["profile_id"],
                    'profile' => $res["profile"],
                ];

                header('Location: ' . ROOT_URL);
            } else {
                Message::setmessage($res, 'error');
            }
        }
        $this->returnView($res, false);
    }

    /**
     * Tela inicial da Home
     */
    protected function jsonDelete() {
        $res = array();

        $id = $this->request['id'];
        
        
        $viewmodel = new UsersModel();
        
        
        // verifica se o id existe
        if ($id) {
            
            $result = $viewmodel->delete($id);            
            // verifica se ocorreu algum problema
            if ($result["code"] !== OK_CODE) {
                $this->returnJson(['data' => $result['msg']], NOT_FOUND_CODE);                
                return;
            } else {
                $res = $id;
            }
            
            $this->returnJson(['data' => $res], $result["code"]);
            
        } else {
            $this->returnJson(['data' => NOT_FOUND_ID], NOT_FOUND_CODE);
        }
    }

}
