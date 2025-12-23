<?php 
    class db{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "Metis"; 
    private $port = 3307;

    protected function connect(){
        try{
             $connect = new PDO("mysql:host=" . $this->server . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->user, $this->pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        }
         catch(PDOException $e){
        echo "Connection Failed :" . $e->getMessage(); 
        } 
    }

    }
?>
