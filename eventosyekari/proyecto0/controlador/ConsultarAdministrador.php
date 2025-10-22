<?php
require_once("../controlador/AdministradorControlador.php");
require_once("../modelo/Administrador.php");

if(isset($_POST["Identificacion"])and $_POST["Actualizar"]){
$AdministradorControlador = new AdministradorControlador();
$Administradores = $AdministradorControlador->ConsultarAdministrador($_POST["Identificacion"]);
foreach($Administradores as $Administrador){

/*echo $Administrador["Identificacion"];
echo $Administrador["Nombre"];
echo $Administrador["Apellido"];
echo $Administrador["CargaEmpresarial"];
echo $Administrador["Direccion"];
echo $Administrador["Celular"];
echo $Administrador["FechaNacimiento"];
echo $Administrador["CorreoElectronico"];
echo $Administrador["Clave"];*/

}//fin
}

?>