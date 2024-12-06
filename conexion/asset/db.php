<?php
    class dba{
        private $host="localhost";
        private $db="galeria";
        private $user="root";
        private $password="";

        public function conexion(){
            try {
                $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->password);
                return $PDO;
            } catch (PDOException $ERROR) {
                return $ERROR->getMessage();
            }
        }
    }
    $nombre = "Administrador";
    
    $obj = new dba();
    $PDO=$obj->conexion();
    $statement = $PDO->prepare("insert into cargo values(null, :nombre)");
    $statement->bindParam(":nombre",$nombre);
    $statement->execute();
    print_r($PDO->lastInsertId());

?>