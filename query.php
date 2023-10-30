<?
    /**
     * 
     * Rubén Sepúlveda O.
     * 29-10-2023
     * 
     * 
     * interface
     *
     * interface para querys (desacoplamiento)
	 * 
     *
     */

require('conexion.php');
class Query{
    function __construct(){
           
    }
    public static function query($query){
        $singleton = Singleton::getInstance();
        $pdo = $singleton->getPDO();
        $statement = $pdo->prepare($query);
        $statement->execute();
        $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public static function insert($query){
        $singleton = Singleton::getInstance();
        $pdo = $singleton->getPDO();
        $statement = $pdo->prepare($query);
        $statement->execute();
        if($statement->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}

