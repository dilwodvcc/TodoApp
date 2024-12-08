<?php
namespace App;

class DB
{
    public mixed $host;
    public mixed $dbname;
    public mixed $user;
    public mixed $password;
    public \PDO $pdo;

    public function __construct(){
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];

        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }
}