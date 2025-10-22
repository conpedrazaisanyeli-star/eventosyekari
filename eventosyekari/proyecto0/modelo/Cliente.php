<?php
// namespace Modelo;
// use Config\Database;

require_once("../controlador/db.php");

class Cliente {
    private $conexion;

    public function __construct(){
        $database = new Database();
        $this->conexion = $database->getConnect();
    }

    // Crear Cliente
    public function create($Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave){
        $sql = "INSERT INTO Cliente (Identificacion, Nombre, Apellido, Direccion, Celular, FechaNacimiento, CorreoElectronico, Clave) 
                VALUES (:Identificacion, :Nombre, :Apellido,  :Direccion, :Celular, :FechaNacimiento, :CorreoElectronico, :Clave)";
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':Identificacion', $Identificacion); //1
        $stmt->bindParam(':Nombre', $Nombre);//2
        $stmt->bindParam(':Apellido', $Apellido);//3
        $stmt->bindParam(':Direccion', $Direccion);//5
        $stmt->bindParam(':Celular', $Celular);//6
        $stmt->bindParam(':FechaNacimiento', $FechaNacimiento);//7
        $stmt->bindParam(':CorreoElectronico', $CorreoElectronico);//8
        $stmt->bindParam(':Clave', $Clave);//9
   

        return $stmt->execute();
    }

    // Seleccionar Cliente
    public function read($Identificacion)
    {
     if($Identificacion!=NULL){
         $sql="select * from Cliente where Identificacion=".$Identificacion;
        }
            else{
               $sql="select * from Cliente";
            }
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    

    // Actualizar Cliente
    public function update( $Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1){
        $sql = "UPDATE Cliente  SET 

                    Identificacion = :Identificacion,
                    Nombre = :Nombre, 
                    Apellido = :Apellido, 
                    Direccion = :Direccion, 
                    Celular = :Celular, 
                    FechaNacimiento = :FechaNacimiento,  
                    CorreoElectronico = :CorreoElectronico, 
                    Clave = :Clave 
                    WHERE Identificacion = :Identificacion1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':Identificacion', $Identificacion);
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Apellido', $Apellido);
        $stmt->bindParam(':Direccion', $Direccion);
        $stmt->bindParam(':Celular', $Celular);
        $stmt->bindParam(':FechaNacimiento', $FechaNacimiento);
        $stmt->bindParam(':CorreoElectronico', $CorreoElectronico);
        $stmt->bindParam(':Clave', $Clave);
       $stmt->bindParam(':Identificacion1', $Identificacion1);//10

        return $stmt->execute();
    }

    // Eliminar Cliente
    public function delete($Identificacion){
        $sql = "DELETE FROM Cliente WHERE Identificacion = :Identificacion";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':Identificacion', $Identificacion);
        return $stmt->execute();
    }
}
?>

