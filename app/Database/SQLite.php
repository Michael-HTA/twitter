<?php
namespace Database;

require_once __DIR__."/../Interface/DatabaseInterface.php";
use App\Interface\DatabaseInterface;
use PDO;
use PDOException;

class SQLite implements DatabaseInterface{

    private $db;

    public function __construct(private $dbPath)
    {
    }

    public function connect(){

        try{

            $this->db = new PDO("sqlite:$this->dbPath");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $this->db;

        }catch(PDOException $e){
            
            return $e->getMessage();
        }
    }
}