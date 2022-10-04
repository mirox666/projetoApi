<?php
namespace App\model;

use PDO;

class Conexao{

    private static $instancia;
    
    public static function getConexao(){
        if(!isset(self::$instancia)){
            self::$instancia = new \PDO("mysqo:host=localhost;dbname=projeto_api","root","");
        }
        return self::$instancia;
    }
}
