<?php

namespace App\Infrastructure\Persistence;

use PDO;

class Conexao {
    
    private static $instance;


    public static function getConn() {

        if(!isset(self::$instance)):
            self::$instance = new PDO('mysql:host=localhost;dbname=challenge;charset=utf8','root','mariadb@password!');
        endif;
        
        return self::$instance;
    }
}