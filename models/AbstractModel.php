<?php

/*
 * Stefanini
 * App Inventário API
 * Criado por Wallison 19/02/2018
 */

namespace models;

/**
 * classe Abastrata para as model, nela é feito tanto as conexão com o 
 * banco como aqui estão instanciados todo o pdo
 * @author Wallison do Carmo Costa
 */
abstract class AbstractModel {

    protected $db;
    protected $stmt;

    /**
     * Cria uma instancia do banco
     */
    public function __construct() {


        try {
            $this->db = new \PDO(MY_DRIVER . ':host=' . MY_DB_HOST . ';dbname=' . MY_DB_NAME . ";charset=utf8", MY_DB_USER, MY_DB_PASS);
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }

    /**
     * Prepara a query para ser usada no banco
     * @param type $query Recebe a query
     */
    protected function query($query) {
        $this->stmt = $this->db->prepare($query);

        if (!$this->stmt) {
            $this->getErrorSTMT();
        };
    }

    /**
     * Monta o Bind e adiciona ao stmt do PDO
     * @param type $param - Posição no bind
     * @param type $value - Valor do parametro
     * @param type $type  - Tipo do parametro
     */
    protected function bind($param, $value, $type = null) {

        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;

                default:
                    $type = \PDO::PARAM_STR;
                    break;
            }
        }

        if (!$this->stmt->bindValue($param, $value, $type)) {
            $this->getErrorSTMT();
        };
    }

    /**
     * Executa uma query, UPDATE, DELETE, INSERT
     */
    protected function execute() {

        if (!$this->stmt->execute()) {
            $this->getErrorSTMT();
        }
    }

    /**
     * Executa uma query e retorna uma lista, SELECT
     * @return type
     */
    protected function resultSet() {
        if (!$this->stmt->execute()) {
            $this->getErrorSTMT();
        }
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Recupera o ultimo id inserido
     * @return type retorna o id inserido
     */
    protected function lastInsertId() {
        $id = $this->db->lastInsertId();
        if (!$id) {
            $this->getErrorDB();
        }

        return $id;
    }

    /**
     * Recupera um unico registro
     * @return type
     */
    protected function findOne() {
        $this->execute();

        $res = $this->stmt->fetch(\PDO::FETCH_ASSOC);


        return $res;
    }

    /**
     * Gerar um where por meio de um param
     * @param type $parm [{key} é o nome do campo] [{value} valor do campo] [{type} tipo de where (= ,!= ,< ,> ,like ,etc)]
     * @param type $and false significa que o where não começa com AND
     */
    protected function gerarWhere($param, $and = true) {

        $i = 0;
        $and_where = 0;
        $query = '';
        foreach ($param as $key => $current) {
            $and_where = " AND ";
            if ($i == 0 && !$and) {
                $and_where = ' ';
            }
            $query .= $and_where . $key . $current['type'] . ':' . $key;
            $i++;
        }

        return $query;
    }

    /**
     * Gerar um where por meio de um param
     * @param type $parm [{key} é o nome do campo] [{value} valor do campo] [{type} tipo de where (= ,!= ,< ,> ,like ,etc)]
     */
    protected function gerarBindWhere($param) {

        foreach ($param as $key => $current) {
            $this->bind(':' . $key, $current['value']);
        }
    }

    /**
     * Recupera erro do stmt
     */
    private function getErrorSTMT() {
        
        $msg['code'] =CONFLICT_CODE;
        $msg['message'] ='[' . $error[0] . ']' . $error[2];  
        return $msg;   
    }

    /**
     * Recupera erro do banco
     */
    private function getErrorDB() {
        $msg['code'] =CONFLICT_CODE;
        $msg['message'] ='[' . $error[0] . ']' . $error[2];  
        return $msg;
  
    }

}
