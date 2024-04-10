<?php
namespace App\Database\Drivers;

// require_once __DIR__."/../Interface/DatabaseInterface.php";
// include_once(__DIR__. "/../../vendor/autoload.php");

use App\Interface\DatabaseInterface;
use PDO;
use PDOException;

class MySQL implements DatabaseInterface{

    private $db;

    public function __construct(
        // setting default values if user does not give parameter values
        private $dbhost = "localhost",
        private $dbname = "twitter",
        private $dbuser = "root",
        private $dbpass = "",
    ) 
    {

    }

    public function connect()
    {
        try {

            $this->db = new PDO(
                "mysql:host=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_PERSISTENT => TRUE,
                ]
            );

            return $this->db;

            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        
    }
}
