<?php
namespace App\Database\Drivers;

// require_once __DIR__."/../Interface/DatabaseInterface.php";
// include_once(__DIR__. "/../../vendor/autoload.php");

use App\Interface\DatabaseInterface;
use PDO;
use PDOException;

class SQLite implements DatabaseInterface{

    private $db;
    // in window the problem is "\" it need to escape the '\t'
    //in linux db need to put under apache server 
    // private $db_path = '/var/www/html/purephp/twitter.db';
    private $db_path = "D:\Learning\Programming\databases\\twitter.db";

    public function connect(){

        try{
            // Note-> setting the database setting in the constructor is better
            $this->db = new PDO("sqlite:$this->db_path",null,null,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT => TRUE,
            ]);

            //comment out due to some downside 
            // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            //enabling foreign_keys constrain
            $this->db->exec("PRAGMA foreign_keys = ON;");

            return $this->db;

        }catch(PDOException $e){
            
            return $e->getMessage();
        }
    }
}