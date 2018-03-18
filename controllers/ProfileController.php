<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace controllers;

use controllers\AbstractController;


use classes\Profiles;
use models\ProfilesModel;
use config\message\Message;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class ProfileController extends AbstractController {

    
     protected function index() {
        $res = array();

        $obj = new Profiles();

        $viewmodel = new ProfilesModel();
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
            $obj = new Profiles();

            $obj->setProfile(trim($post['profile'])); 
            $obj->setActive(1);

            $viewmodel = new ProfilesModel();

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

            $viewmodel = new ProfilesModel();
            $result = $viewmodel->findById($id);

            if ($result["code"] !== OK_CODE) {
                Message::setmessage($result['msg'], 'error');
            } else {
                $res['profile'] = $result['data'];
            }
        }

        $this->returnView($res, true);
    }
    
    
    /**
     * Tela inicial da Home
     */
    protected function jsonDelete() {
        $res = array();

        $id = $this->request['id'];        
        
        $viewmodel = new ProfilesModel();        
        
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
