<?php

require_once('../modelo/Cliente.php');


class ClienteControlador {
//inicio funcion crear Cliente
    public function crearCliente ($Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave){
        $Cliente = new Cliente();
        return $Cliente->create($Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave);
    }
//fin funcion

//inicio funcion listar Cliente
    public function listarCliente() {
        $Cliente = new Cliente();
        return $Cliente->read(NULL);
    }
//fin funcion

//inicio funcion Consultar Cliente
    public function ConsultarCliente($Identificacion) {
        $Cliente = new Cliente();
        return $Cliente->read($Identificacion);
    }
//fin funcion

// Inicio funcion Actilizar Cliente
    public function actualizarCliente($Identificacion, $Nombre, $Apellido,$Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1){
    $Cliente = new Cliente();
    return $Cliente->update($Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1);
    }
//fin funcion

//Inicio funcion actualizar Cliente
public function eliminarCliente($Identificacion){
    $Cliente = new Cliente();
    return $Cliente->delete($Identificacion);
}


}


if (isset($_POST["Identificacion"]) and !isset ($_POST["Accion"])){
$Identificacion=$_POST["Identificacion"];
$Nombre=$_POST["Nombre"];
$Apellido=$_POST["Apellido"];
$Direccion=$_POST["Direccion"];
$Celular=$_POST["Celular"];
$FechaNacimiento=$_POST["FechaNacimiento"];
$CorreoElectronico=$_POST["CorreoElectronico"];
$Clave=$_POST["Clave"];
echo "<br>Identificacion:".$Identificacion."<br>";
echo "Nombre:".$Nombre."<br>";
echo "Apellido:".$Apellido."<br>";
echo "Direccion:".$Direccion."<br>";
echo "Celular:".$Celular."<br>";
echo "FechaNacimiento:".$FechaNacimiento."<br>";
echo "CorreoElectronico:".$CorreoElectronico."<br>";
echo "Clave:".$Clave."<br>";

$ClienteControlador = new ClienteControlador();
try {
$Clientes = $ClienteControlador->crearCliente($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave);
$Mensaje="Registrado";
}
catch (PDOException $e){
$Mensaje= "error al registar el Cliente".$e->getMessage();
}

header("Location: ../vista/Cliente_listar.php?m=".$Mensaje);

}//cierre if validaciom existencia de registro




else if (isset($_POST["Identificacion"]) and $_POST["Accion"]== "Eliminar" ){
    $Identificacion=$_POST["Identificacion"];
    $ClienteControlador =new ClienteControlador();
    $Clientes = $ClienteControlador->eliminarCliente($Identificacion);
    header("Location:../vista/Cliente_listar.php?m=Eliminado");
    
}
else if (isset($_POST["Identificacion"]) and $_POST["Accion"]=="Actualizar" and isset ($_POST["Identificacion1"])){
echo "Actulizando";
echo "Actualizando";
echo $_POST["Identificacion"]."<br>";
echo $_POST["Accion"]."<br>";
echo $_POST["Identificacion1"]."<br>";
$Identificacion=$_POST["Identificacion"];
$Nombre=$_POST["Nombre"];
$Apellido=$_POST["Apellido"];
$Direccion=$_POST["Direccion"];
$Celular=$_POST["Celular"];
$FechaNacimiento=$_POST["FechaNacimiento"];
$CorreoElectronico=$_POST["CorreoElectronico"];
$Clave=$_POST["Clave"];
echo "<br>Identificacion:".$Identificacion."<br>";
echo "Nombre:".$Nombre."<br>";
echo "Apellido:".$Apellido."<br>";
echo "Direccion:".$Direccion."<br>";
echo "Celular:".$Celular."<br>";
echo "FechaNacimiento:".$FechaNacimiento."<br>";
echo "CorreoElectronico:".$CorreoElectronico."<br>";
echo "Clave:".$Clave."<br>";

$ClienteControlador = new ClienteControlador();
$Clientes = $ClienteControlador->actualizarCliente ($Identificacion, $Nombre, $Apellido, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $_POST ["Identificacion1"]);
 
header("Location:../vista/Cliente_listar.php?m=Eliminado");
 

}
?>