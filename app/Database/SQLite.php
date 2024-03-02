<?php
namespace Database;

require_once __DIR__."/../Interface/DatabaseInterface.php";
use App\Interface\DatabaseInterface;
use PDO;
use PDOException;

class SQLite implements DatabaseInterface{

    private $db;
    // in window the problem is "\" it need to escape the '\t'
    //in linux db need to put under apache server 
    private $db_path = '/var/www/html/purephp/twitter.db';
    // private $db_path = "D:\Learning\Programming\databases\\twitter.db";

    public function __construct()
    {
    }

    public function connect(){

        try{

            $this->db = new PDO("sqlite:$this->db_path");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $this->db;

        }catch(PDOException $e){
            
            return $e->getMessage();
        }
    }
}