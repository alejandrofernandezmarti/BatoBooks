<?php
namespace BatBook;
use PDO;
use PDOException;

include_once($_SERVER['DOCUMENT_ROOT']."/config/database.inc.php");

class Connection{
    private $connection;

    public function __construct(){

        try {
            $this->connection = new PDO(NAME_SERVER,USER_SERVER,PASSWORD_SERVER);
        }catch (PDOException $e){
            echo "Fallo la conexión: " . $e->getMessage();
        }
    }
    public function getConection(){
        return $this->connection;
    }
    public static function get(): PDO
    {
        $conn = new Connection();
        return $conn->getConection();
    }


}