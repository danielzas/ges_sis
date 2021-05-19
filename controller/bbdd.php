<?php
class bd
{
public function __construct()
{
   $this->host="localhost";
   $this->port="3306";
   $this->db="ges_sis";
   $this->user="root";
   $this->password="";
   $this->charset="utf8mb4";/*averiguar mas */
}

public function connect()
{
    try{
$conexion="mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->db.";charset=".$this->charset;
      //**que es esto? */  
      
        $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false];

        $pdo=new PDO($conexion,$this->user,$this->password,$options);
        return $pdo;
    }catch(PDOException $e){
        print_r("Error connection:" . $e->getMessage());
    }
}
}

?>
