<?php
require_once("../controlador/ClienteControlador.php");
require_once("../modelo/Cliente.php");

if(isset($_POST["Identificacion"])and $_POST["Actualizar"]){
$ClienteControlador = new ClienteControlador();
$Clientes = $ClienteControlador->ConsultarCliente($_POST["Identificacion"]);
foreach($Clientes as $Cliente){

/*echo $Cliente["Identificacion"];
echo $Cliente["Nombre"];
echo $Cliente["Apellido"];
echo $Cliente["CargaEmpresarial"];
echo $Cliente["Direccion"];
echo $Cliente["Celular"];
echo $Cliente["FechaNacimiento"];
echo $Cliente["CorreoElectronico"];
echo $Cliente["Clave"];*/

}//fin
}

?>