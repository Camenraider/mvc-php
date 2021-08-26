<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;
    
    // =============CONECTAR===============================================
    private function ligar(){
        
        $this->ligacao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // DEBUG
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // =============DESCONECTAR===============================================
    private function desligar(){
        $this->ligacao = null;
    }

    // ============================================================
    // CRUD SELECT
    // ============================================================
    // ============================================================
    
    public function select($sql,$parametros = null){

        // verifica se é uma instrução SELECT
        if (!preg_match("/^SELECT/i", $sql)){
            // apresenta o erro
            throw new Exception('Base de dados - não é uma instrução select.');

            // não mostra a linha e o erro
            //die("Base de dados - não é uma instrução select.");
        }


        // liga ao DB
        $this->ligar();

        $resultado = null;

        // comunica
        try {
            // comunicação com DB
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }
        // desliga
        // desconecta do bando de dados
        $this->desligar();

        // retorna os resultados
        return $resultados;
    }

    // ============================================================
    // CRUD INSERT
    // ============================================================
    // ============================================================

    public function insert($sql,$parametros = null){

        // verifica se é uma instrução SELECT
        if (!preg_match("/^INSERT/i", $sql)){
            // apresenta o erro
            throw new Exception('Base de dados - não é uma instrução insert.');

            // não mostra a linha e o erro
            //die("Base de dados - não é uma instrução select.");
        }


        // liga o DB
        $this->ligar();

        
        // comunica
        try {
            // comunicação com DB
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }
        // desliga
        // desconecta do bando de dados
        $this->desligar();
    }

    // ============================================================
    // CRUD UPDATE
    // ============================================================
    // ============================================================

    public function UPDATE($sql,$parametros = null){

        // verifica se é uma instrução UPDATE
        if (!preg_match("/^UPDATE/i", $sql)){
            // apresenta o erro
            throw new Exception('Base de dados - não é uma instrução update.');

            // não mostra a linha e o erro
            //die("Base de dados - não é uma instrução select.");
        }


        // liga o DB
        $this->ligar();

        
        // comunica
        try {
            // comunicação com DB
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }
        // desliga
        // desconecta do bando de dados
        $this->desligar();
    }

    // ============================================================
    // CRUD DELETE
    // ============================================================
    // ============================================================

    public function delete($sql,$parametros = null){

        // verifica se é uma instrução DELETE
        if (!preg_match("/^DELETE/i", $sql)){
            // apresenta o erro
            throw new Exception('Base de dados - não é uma instrução delete.');

            // não mostra a linha e o erro
            //die("Base de dados - não é uma instrução select.");
        }


        // liga o DB
        $this->ligar();

        
        // comunica
        try {
            // comunicação com DB
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }
        // desliga
        // desconecta do bando de dados
        $this->desligar();
    }

    // ============================================================
    // CRUD GENÉRICA
    // ============================================================
    // ============================================================

    public function statement($sql,$parametros = null){

        // verifica se é uma instrução diferente das outras
        if (preg_match("/^(INSERT|SELECT|UPDATE|DELETE)/i", $sql)){
            // apresenta o erro
            throw new Exception('Base de dados - instrução inválida.');

            // não mostra a linha e o erro
            //die("Base de dados - não é uma instrução select.");
        }


        // liga o DB
        $this->ligar();

        
        // comunica
        try {
            // comunicação com DB
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }
        // desliga
        // desconecta do bando de dados
        $this->desligar();
    }
}

?>