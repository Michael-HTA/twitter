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

            //db unlock
            $db->commit();

            //return id
            return $db->lastInsertId();

        }catch(PDOException $e){
            if($e->getMessage()) {

                //db rollback
                $db->rollBack();
                return false;
            }
        }
    }
}