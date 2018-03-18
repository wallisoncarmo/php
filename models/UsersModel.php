<?php

/*
 * Stefanini
 * App Inventário API
 * Criado por Wallison 19/02/2018
 */

namespace models;

use models\AbstractModel;
use classes\Users;

/**
 * model de login
 * @author Wallison do Carmo Costa
 */
class UsersModel extends AbstractModel {

    function findAll(Users $obj) {
        $this->query("SELECT
                        u.id,
                        u.username,
                        u.active,
                        u.dt_create,
                        u.dt_update,
                        u.profile_id,
                        profile 
                        FROM users as u
                    INNER JOIN profiles as p ON (profile_id=p.id)
                    WHERE u.active=true;");

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->resultSet();
        return $rows;
    }

    function findById($id) {
        $this->query("SELECT 
                        u.id,
                        u.username,
                        u.active,
                        u.dt_create,
                        u.dt_update,
                        u.profile_id,
                        profile 
                        FROM users as u
                    INNER JOIN profiles as p ON (profile_id=p.id)
                    WHERE u.active=true
                    AND u.id=:id;");
        $this->bind(':id', $id);

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->findOne();
        return $rows;
    }

    function count($param = null) {

        $query = "SELECT 
                    COUNT(*) AS value 
                FROM users                
                WHERE active=true ";

        $query .= $this->gerarWhere($param);

        $this->query($query);

        $this->gerarBindWhere($param);

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->findOne();
        return $rows;
    }

    public function checkEmail(Users $obj, $id = 0) {

        $this->query("SELECT * FROM users WHERE active=true AND username=:username AND id!=:id");
        $this->bind(':username', $obj->getUsername());
        $this->bind(':id', $id);

        $result = ($this->findOne());
        if ($this->findOne()) {
            return $result;
        } else {
            return ERROR_LOGIN_EMAIL;
        };
    }

    private function checkEmailSenha(Users $obj) {

        $this->query("SELECT u.*, profile FROM users as u
                    INNER JOIN profiles as p ON (profile_id=u.id)
                    WHERE u.active=true  
                AND username=:username 
                AND password=md5(:password)");
        $this->bind(':username', $obj->getUsername());
        $this->bind(':password', $obj->getPassword());
        $res = $this->findOne();

        if ($res) {
            return $res;
        } else {
            return ERROR_LOGIN_SENHA;
        };
    }

    function login(Users $obj) {

        // verifica se o email existe
        if ($this->checkEmail($obj) != ERROR_login_EMAIL) {
            //verifica se a senha e o login batem
            return $this->checkEmailSenha($obj); // retorna um registro ou um erro
        }

        return ERROR_LOGIN_EMAIL;
    }

    /**
     * deleta uma classificação
     * @param classificacoes $obj
     * @return boolean
     */
    function delete($id) {
        $res = [];

        $this->query('UPDATE users
                    SET
                        active = false,
                        dt_update = now()
                    WHERE id = :id;');
        $this->bind(':id', $id);

        $res['code'] = OK_CODE;
        $res['data'] = $this->execute();
        return $res;
    }

    /**
     * adiciona uma nova classificação
     * @param classificacoes $obj
     * @return array com o id
     */
    function add(Users $obj) {
        $res = [];

        $this->query("INSERT INTO users
                    (username,password,profile_id)
                    VALUES
                    (:username,md5(:password),:profile_id);");
        $this->bind(':username', $obj->getUsername());
        $this->bind(':password', $obj->getPassword());
        $this->bind(':profile_id', $obj->getProfile()->getId());

        $this->execute();
        $res['code'] = OK_CODE;
        $res['data'] = $this->lastInsertId();
        return $res;
    }

    /**
     * atualiza uma classificacao
     * @param classificacoes $obj
     */
    function update(Users $obj) {
        $res = [];


        $query = "UPDATE users
                    SET
                        username = :username,
                        active = :active,
                        dt_update = now(),
                        ";
        $query .= ($obj->getPassword()) ? " password = md5(:password), " : "";
        $query .= " profile_id = :profile_id
                    WHERE id = :id;";

        $this->query($query);
        $this->bind(':username', $obj->getUsername());
        ($obj->getPassword()) ? $this->bind(':password', $obj->getPassword()) : "";
        $this->bind(':active', $obj->getActive());
        $this->bind(':profile_id', $obj->getProfile()->getId());
        $this->bind(':id', $obj->getId());

        $res['code'] = OK_CODE;
        $res['data'] = $this->execute();
        return $res;
    }

}
