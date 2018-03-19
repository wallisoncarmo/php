<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace classes;

/**
 * Entidade de acessos
 * @author Wallison do Carmo Costa
 */
class Profiles {

    private $id;
    private $profile;
    private $active;
    private $create;
    private $update;
    
    function getId() {
        return $this->id;
    }

    function getProfile() {
        return $this->profile;
    }

    function getActive() {
        return $this->active;
    }

    function getCreate() {
        return $this->create;
    }

    function getUpdate() {
        return $this->update;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProfile($profile) {
        $this->profile = $profile;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setCreate($create) {
        $this->create = $create;
    }

    function setUpdate($update) {
        $this->update = $update;
    }

}
