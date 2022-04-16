<?php 

class Connection{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "kundenverwaltung";
    private $conn;

    public function __construct(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$ $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            //$ $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }
    }


    public function getDB(){
        return $this->conn;
    }

}

?>