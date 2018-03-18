<?php

/*
 * Stefanini
 * App Inventário API
 * Criado por Wallison 19/02/2018
 */

namespace models;

use models\AbstractModel;
use classes\Profiles;

/**
 * model de login
 * @author Wallison do Carmo Costa
 */
class ProfilesModel extends AbstractModel {

    function findAll(Profiles $obj) {
        $this->query("SELECT *
                    FROM profiles
                    WHERE active=true;");

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->resultSet();

        return $rows;
    }

    function findById($id) {
        $this->query("SELECT 
                        *
                    FROM profiles
                    WHERE active=true
                    AND id=:id;");
        $this->bind(':id', $id);

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->findOne();
        return $rows;
    }

    function count($param = null) {
        $query = "SELECT 
                    COUNT(*) AS value 
                FROM profiles                
                WHERE active=true ";

        $this->query($query);

        foreach ($param as $key => $value) {
            $this->bind(':' . $key, $value);
        }

        $rows['code'] = OK_CODE;
        $rows['data'] = $this->findOne();
        return $rows;
    }

    /**
     * deleta uma classificação
     * @return boolean
     */
    function delete($id) {
        $res = [];

        $this->query('UPDATE profiles
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
     * @param Profiles $obj
     * @return array com o id
     */
    function add(Profiles $obj) {
        $res = [];

        $this->query("INSERT INTO profiles (profile)VALUES(:profile);");
        $this->bind(':profile', $obj->getProfile());

        $this->execute();
        $res['code'] = OK_CODE;
        $res['data'] = $this->lastInsertId();
        return $res;
    }

    /**
     * atualiza uma classificacao
     * @param Profiles $obj
     */
    function update(Profiles $obj) {
        $res = [];

        $this->query("UPDATE profiles
                    SET
                        profile = :profile,
                        active = :active,
                        dt_update = now()
                    WHERE id = :id;");
        $this->bind(':profile', $obj->getProfile());
        $this->bind(':active', $obj->getActive());
        $this->bind(':id', $obj->getId());

        
        $res['code'] = OK_CODE;
        $res['data'] = $this->execute();
        return $res;
    }

}
