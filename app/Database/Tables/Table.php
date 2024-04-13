<?php
namespace App\Database\Tables;
use PDOException;

class Table{
    
    protected function storeOrUpdate($db,$statement,$data){

        try{
            //db lock
            $db->beginTransaction();

            //query execution
            $statement->execute($data);

            //getting last row id
            $id = $db->lastInsertId();

            //db unlock
            $db->commit();

            //return id
            return $id;

        }catch(PDOException $e){

            if ($db->inTransaction()) {
                // Rollback the transaction
                $db->rollBack();
            }

            error_log(date('[Y-m-d H:i:s]') . "Error at store or update: ". $e->getMessage() . "\n",3,'/var/www/html/logs/twitter-error.log');
            return false;
        }
    }
}