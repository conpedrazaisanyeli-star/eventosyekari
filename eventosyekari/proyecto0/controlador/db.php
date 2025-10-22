<?php
//echo "<h6>Scrip de conexion a base de datos </h6>";
//$NotaDefinitiva=4.5;
/*echo $NotaDefinitiva."<br>";
echo $NotaDefinitiva/2;*/
//namespace Config;


class Database{

private $host="127.0.0.1";
private $dbname="eventosyekari";
private $username="root";
private $password="";
public $conn;

public function getConnect(){
    $this->conn = null;
    try {
        $this->conn = new PDO(
            "mysql:host=". $this->host. ";dbname=". $this->dbname,
            $this->username,
            $this->password
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $exception){
        echo"error de conexion:". $exception->getMessage();
    }
         return $this->conn;
}

}

$database = new Database();
$conn = $database->getConnect();
if ($conn){
   // echo"conexion exitoso";
} else {
     echo "Error de conexion";
    }
 ?>