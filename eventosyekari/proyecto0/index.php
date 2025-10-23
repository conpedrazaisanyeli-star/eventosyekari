<?php 
//session_start(); //el dato que quiera mostrar si ya esta logueado 
if(isset($_SESSION[" Identificacion"])) { 
 echo "<h6>"-$_SESSION['Identificacion']." - "; 
 echo $_SESSION[ 'Nombres']." - "; 
 echo $_SESSION[ 'Apellidos ']."</h6>";} 

 ?>  
    <?php include_once("vista/home.php");
     if(isset($_GET["m"])) {echo "<br><h2>".$_GET["m"]."</h2>";}

?>