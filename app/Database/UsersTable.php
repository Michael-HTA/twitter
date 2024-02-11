<?php
namespace Database;

class UsersTable{
    private $db;
    public function __construct(MySQL $mysql)
    {
        $this->db = $mysql->connect();
    }

}