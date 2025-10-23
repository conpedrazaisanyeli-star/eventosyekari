<?php
session_start();
include("db.php");
include("AdministradorControlador.php");

$Identificacion = $_POST['Identificacion'];
$Clave = $_POST["Clave"];
echo $Identificacion; 
echo $Clave;
try {
//Crear el objeto AdministradorControlador para consultar la BD
$AdministradorControlador = new AdministradorControlador();
$Administradores = $AdministradorControlador->ConsultarAdministrador($_POST["Identificacion"]);} 
 catch (PDOException $e){
     $Mensaje="Error al consultar el Administrador".$e->getMessage();
 }
 print_r($Administradores);
echo $Administradores [0] ["Identificacion"]. "<br>";
echo $Administradores[0]["Clave"];
echo $_SERVER[ 'PHP_SELF']; 
echo $Clave;
echo $Identificacion;
// Verificar la contraseña encriptada 
      if ($Administradores[0]["Clave"] == $Clave) {
         $_SESSION['Identificacion'] = $Administradores[0]["Identificacion"]; 
         $_SESSION ["Nombre"] = $Administradores[0]["Nombre"]; 
         $_SESSION['Apellido'] = $Administradores[0] ["Apellido"]; 
         header ("Location: /eventosyekari/eventosyekari/Proyecto0/vista/menu.php?m=Sesion iniciada"); 
         exit();     } 
    else { 
        echo $_SERVER["PHP_SELF"];
        echo "Datos incorrectos. <a href='../vista/login.php'>Volver</a>";
         header ("Location: /eventosyekari/eventosyekari/Proyecto0/vista/login.php?m=Datos incorrectos.");
         }

 ?>