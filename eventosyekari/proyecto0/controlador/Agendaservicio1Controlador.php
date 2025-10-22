<?php

//namespace Controller;
//use Modelo\Administrador;
require_once("../modelo/Administrador.php");
//Definicion de clase AdministradorControlador
class AdministradorControlador{

    //Inicio funcion Crear Administrador
    public function crearAdministrador($Identificacion, $Nombres, $Apellidos, $CargaEmpresarial, $Direccion, $Cedula, $Telefono, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave){

        $Administrador = new Administrador(); //Se llama Administrador.php y se utiliza __construct
        return $Administrador->create($Identificacion, $Nombres, $Apellidos, $Direccion, $CargaEmpresarial, $Cedula, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave);

    }// Fin funcion Crear Administrador

    // Inicio funcion listar Administradores
    public function listarAdministrador(){
        $Administrador = new Administrador();
        return $Administrador->read(NULL);
    } //Fin funcion listar Administradores

    // Inicio funcion Consultar Administrador
    public function ConsultarAdministrador($Identificacion){
        $Administrador = new Administrador();
        return $Administrador->read($Identificacion);
    } //Fin funcion consultar Administradores

    // Inicio funcion actualizar Administrador
    public function actualizarAdministrador($Identificacion, $Nombres, $Apellidos, $Direccion, $Telefono,$Cedula, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave, $Identificacion1) {
        $Administrador = new Administrador(); //Creamos la instancia de Administrador
        return $Administrador->update($Identificacion, $Nombres, $Apellidos, $Direccion, $Telefono, $Cedula, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave, $Identificacion1);
    } //

    //Inicio funcion eliminar Administrador
    public function eliminarAdministrador($Identificacion){
        $Administrador = new Administrador();
        return $Administrador->delete($Identificacion);
    }

}
if(isset($_POST["Identificacion"]) and !isset($_POST["Accion"])) {
    $Identificacion=$_POST["Identificacion"]; 
    $Nombres=$_POST["Nombres"]; 
    $Apellidos=$_POST["Apellidos"]; 
    $Direccion=$_POST["Direccion"]; 
    $CargaEmpresarial=$_POST["CargaEmpresarial"];
    $Cedula=$_POST["Cedula"];
    $Telefono=$_POST["Telefono"];
    $FechaNacimiento=$_POST["FechaNacimiento"];
    $CorreoElectronico=$_POST["CorreoElectronico"];
    $Hora=$_POST["Hora"];
    $Clave=$_POST["Clave"];
    echo "<br>Identificacion:".$Identificacion."<br>";
    echo "Nombres:".$Nombres."<br>";
    echo "Apellidos:".$Apellidos."<br>";
    echo "Direccion:".$Direccion."<br>";
    echo "CargaEmpresarial:".$CargaEmpresarial."<br>";
    echo "Telefono:".$Telefono."<br>";
    echo "Cedula:".$Cedula."<br>";
    echo "FechaNacimiento:".$FechaNacimiento."<br>";
    echo "CorreoElectronico:".$CorreoElectronico."<br>";
    echo "Hora:".$Hora."<br>";
    echo "Clave:".$Clave."<br>";

    $AdministradorControlador = new AdministradorControlador();
    try {
    $Administradores = $AdministradorControlador->crearAdministrador($Identificacion, $Nombres, $Apellidos, $Direccion, $Telefono, $Cedula, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave);
    $Mensaje="Registrado";
        }
    catch (PDOException $e){
        $Mensaje="Error al registrar el Administrador".$e->getMessage();
    }

    header("Location: ../vista/Administrador_listar.php?m=".$Mensaje);
}// Cierre if validación existencia de registro

else if(isset($_POST["Identificacion"]) and $_POST["Accion"]=="Eliminar" ){
$Identificacion=$_POST["Identificacion"];
echo $Identificacion;
$AdministradorControlador=new AdministradorControlador();
$Administradores = $AdministradorControlador->eliminarAdministrador($Identificacion);
header("Location: ../vista/Administrador_listar.php?m=Eliminado");
}
else if(isset($_POST["Identificacion"]) and $_POST["Accion"]=="Actualizar" and isset($_POST["Identificacion1"])){
/*echo "Actualizando";
echo $_POST["Identificacion"]."<br>";
echo $_POST["Accion"]."<br>";
echo $_POST["Identificacion1"]."<br>";*/
    $Identificacion=$_POST["Identificacion"]; 
    $Nombres=$_POST["Nombres"]; 
    $Apellidos=$_POST["Apellidos"]; 
    $Direccion=$_POST["Direccion"]; 
    $CargaEmpresarial=$_POST["CargaEmpresarial"];
    $Cedula=$_POST["Cedula"];
    $Telefono=$_POST["Telefono"];
    $FechaNacimiento=$_POST["FechaNacimiento"];
    $CorreoElectronico=$_POST["CorreoElectronico"];
    $Hora=$_POST["Hora"];
    $Clave=$_POST["Clave"];
    /*echo "<br>Identificacion:".$Identificacion."<br>";
    echo "Nombres:".$Nombres."<br>";
    echo "Apellidos:".$Apellidos."<br>";
    echo "Direccion:".$Direccion."<br>";
    echo "CargaEmpresarial:".$CargaEmpresarial."<br>";
    echo "Telefono:".$Telefono."<br>";
    echo "Cedula:".$Cedula."<br>";
    echo "FechaNacimiento:".$FechaNacimiento."<br>";
    echo "CorreoElectronico:".$CorreoElectronico."<br>";
    echo "Hora:".$Hora."<br>";
    echo "Clave:".$Clave."<br>";*/

    $AdministradorControlador = new AdministradorControlador();
    $Administradores = $AdministradorControlador->actualizarAdministrador($Identificacion, $Nombres, $Apellidos,$CargaEmpresarial, $Direccion, $Telefono, $Cedula, $FechaNacimiento, $CorreoElectronico, $Hora, $Clave, $_POST["Identificacion1"]);

    header("Location: ../vista/Administrador_listar.php?m=Registrado");
    
}
?> 