<?php
// namespace Modelo;
// use Config\Database;

require_once("../controlador/db.php");

class Administrador {
    private $conexion;

    public function __construct(){
        $database = new Database();
        $this->conexion = $database->getConnect();
    }

    // Crear Administrador
    public function create($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave){
        $sql = "INSERT INTO Administrador (Identificacion, Nombre, Apellido, CargaEmpresarial, Direccion, Celular, FechaNacimiento, CorreoElectronico, Clave) 
                VALUES (:Identificacion, :Nombre, :Apellido, :CargaEmpresarial, :Direccion, :Celular, :FechaNacimiento, :CorreoElectronico, :Clave)";
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':Identificacion', $Identificacion); //1
        $stmt->bindParam(':Nombre', $Nombre);//2
        $stmt->bindParam(':Apellido', $Apellido);//3
        $stmt->bindParam(':CargaEmpresarial', $CargaEmpresarial);//4
        $stmt->bindParam(':Direccion', $Direccion);//5
        $stmt->bindParam(':Celular', $Celular);//6
        $stmt->bindParam(':FechaNacimiento', $FechaNacimiento);//7
        $stmt->bindParam(':CorreoElectronico', $CorreoElectronico);//8
        $stmt->bindParam(':Clave', $Clave);//9
   

        return $stmt->execute();
    }

    // Seleccionar Administrador
    public function read($Identificacion)
    {
        if($Identificacion != NULL){
            // Usar prepared statement con parámetro para evitar problemas de tipo/case o inyección
            $sql = "SELECT * FROM Administrador WHERE Identificacion = :Identificacion";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':Identificacion', $Identificacion);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM Administrador";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    

    // Actualizar Administrador
    public function update( $Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1){
        $sql = "UPDATE Administrador  SET 

                    Identificacion = :Identificacion,
                    Nombre = :Nombre, 
                    Apellido = :Apellido, 
                    CargaEmpresarial = :CargaEmpresarial, 
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
        $stmt->bindParam(':CargaEmpresarial', $CargaEmpresarial);
        $stmt->bindParam(':Direccion', $Direccion);
        $stmt->bindParam(':Celular', $Celular);
        $stmt->bindParam(':FechaNacimiento', $FechaNacimiento);
        $stmt->bindParam(':CorreoElectronico', $CorreoElectronico);
        $stmt->bindParam(':Clave', $Clave);
       $stmt->bindParam(':Identificacion1', $Identificacion1);//10

        return $stmt->execute();
    }

    // Eliminar Administrador
    public function delete($Identificacion){
        $sql = "DELETE FROM Administrador WHERE Identificacion = :Identificacion";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':Identificacion', $Identificacion);
        return $stmt->execute();
    }
}
?>

