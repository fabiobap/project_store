<?php
require_once 'dbconfig.php';
    try{
        $connection = new \PDO(DB_DRIVE. ':host='.DB_HOSTNAME.';port='.DB_PORT.';dbname='.DB_DATABASE.';charset='.DB_CHARSET, DB_USERNAME, DB_PASSWORD);        
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $connection;
    }catch(\PDOException $e){
        // Caso ocorra algum erro na conexão com o banco, exibe a mensagem
        echo 'An error occurred while trying to connect to the database: '.$e->getMessage();
        die();
    }