<?php
    /**
     * 
     * Rubén Sepúlveda O.
     * 29-10-2023
     * 
     * 
     * Singleton
     *
     * clase Singleton para conexion única
	 * 
     *
     */

class Singleton
{
    const HOST_DB = "10.33.1.40";
    const USUARIO_DB = "root";
    const PASSWORD_DB = "123456";
    const BASE_DB = "DTest";
    private static $instance;
    private $pdo;

    private function __construct(){
        $host = self::HOST_DB;
        $dbname = self::BASE_DB;
        $user = self::USUARIO_DB;
        $pass = self::PASSWORD_DB;  
        $this->pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user, $pass);    

    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO() {
        return $this->pdo;
    }


}
