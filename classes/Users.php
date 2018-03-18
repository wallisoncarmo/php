<?php

/*
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace classes;

/**
 * Entidade de usuarios
 * @author Wallison do Carmo Costa
 */
class Users {

    private $id;
    private $username;
    private $password;
    private $profile;
    private $active;
    private $create;
    private $update;

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
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

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setProfile(Profiles $profile) {
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

    /**
     * Aqui deve se informar os campos e seus detalhes
     * [tipo] Dependendo do que foi checkado será validado pelo 
     * seu formato podendo ser [string][integer][boolean][cpf][cnpj][email][date]
     * [obrigatorio] = se o campo é obrigatorio
     * [max] quantidade maxima de caracter
     * [min] quantidade minima de caracter
     * [key] informa se ele é chave primaria
     */
    function getCampos() {
        return [
            'id' => ['tipo' => 'integer', 'obrigatorio' => true, 'key' => true],
            'username' => ['tipo' => 'string', 'max' => 250, 'min' => 5, 'obrigatorio' => true],
            'password' => ['tipo' => 'string', 'max' => 250, 'min' => 5, 'obrigatorio' => true],
            'profile_id' => ['tipo' => 'integer', 'obrigatorio' => true,],
            'create' => ['tipo' => 'string', 'max' => 20, 'min' => 10, 'obrigatorio' => false],
            'update' => ['tipo' => 'string', 'max' => 20, 'min' => 10, 'obrigatorio' => false],
            'active' => ['tipo' => 'boolean', 'obrigatorio' => false],
        ];
    }

}
