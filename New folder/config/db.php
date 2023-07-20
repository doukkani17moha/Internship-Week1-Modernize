<?php

class db{
    private $hostname = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname   = "clinic"; 


    protected function connect(){
        $dsn = 'mysql:host=' . $this->hostname . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}