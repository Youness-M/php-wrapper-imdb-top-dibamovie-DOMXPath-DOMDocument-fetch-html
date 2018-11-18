<?php


class config{

    private $user = "root";
    private $pass = "";
    private $dsn = "mysql:host=localhost;dbname=wrapper";
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->db->exec('set names UTF8');
        } catch (PDOException $error) {
            echo 'Conection field';
        }

    }

    public function conection(){
        $db=new PDO($this->dsn,$this->user,$this->pass);
        $db->exec('set names UTF8');
        return $db;
    }

}

$config=new config();
