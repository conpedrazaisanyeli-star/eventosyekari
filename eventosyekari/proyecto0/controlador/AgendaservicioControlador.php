<?php

//namespace Controller;
//use Modelo\Agendaservicio;
require_once("../modelo/Agendaservicio.php");
//Definicion de clase AgendaservicioControlador

$Dias=["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
$Horas=["6:15-7:10","7:10-8:00","8:00-8:50","8:50-9:40","10:20-11:10","11:10-12:00"];

class AgendaservicioControlador{

    //Inicio funcion Crear Agendaservicio
    public function crearAgendaservicio($CodigoServicio, $Identificacion, $Hora, $Dia){

        $Agendaservicio = new Agendaservicio(); //Se llama Agendaservicio.php y se utiliza __construct
        return $Agendaservicio->create($CodigoServicio, $Identificacion, $Hora, $Dia);

    }// Fin funcion Crear Agendaservicio

    // Inicio funcion listar Agendaservicios
    public function listarAgendaservicio(){
        $Agendaservicio = new Agendaservicio();
        return $Agendaservicio->read(NULL, NULL);
    } //Fin funcion listar Agendaservicios

    // Inicio funcion Consultar Agendaservicio
    public function ConsultarAgendaservicio($CodigoServicio, $Identificacion){
        $Agendaservicio = new Agendaservicio();
        return $Agendaservicio->read($CodigoServicio, $Identificacion);
    } //Fin funcion consultar Agendaservicios

    // Inicio funcion actualizar Agendaservicio
    public function actualizarAgendaservicio($CodigoServicio, $Identificacion, $CodigoServicio1, $Identificacion1) {
        $Agendaservicio = new Agendaservicio(); //Creamos la instancia de Agendaservicio
        return $Agendaservicio->update($CodigoServicio, $Identificacion, $CodigoServicio1, $Identificacion1);
    } //

    //Inicio funcion eliminar Agendaservicio
    public function eliminarAgendaservicio($CodigoServicio, $Identificacion, $Hora, $Dia){
        $Agendaservicio = new Agendaservicio();
        return $Agendaservicio->delete($CodigoServicio, $Identificacion, $Hora, $Dia);
    }

}

/*echo $_POST["CodigoServicio"]."<br>";
echo $_POST["Dia"]."<br>";
echo $_POST["Hora"]."<br>";
echo $_POST["Accion"]."<br>";
echo $_SESSION["Identificacion"]."<br>";*/

if(isset($_POST["CodigoServicio"]) and isset($_SESSION["Identificacion"]) and $_POST["Accion"]=="AgregarCarrito") {
    $CodigoServicio=$_POST["CodigoServicio"]; 
    $Dia=$_POST["Dia"];
    $Hora=$_POST["Hora"]; 
    echo "CodMateria: ".$_POST["CodigoServicio"]."<br>";
    echo "Dia: ".$_POST["Dia"]."<br>";
    echo "Hora: ".$_POST["Hora"]."<br>";
    echo "Accion: ".$_POST["Accion"]."<br>";
    echo "Identificacion: ".$_SESSION["Identificacion"]."<br>";
    $AgendaservicioControlador = new AgendaservicioControlador();
    try {
    $Agendaservicios = $AgendaservicioControlador->crearAgendaservicio($CodigoServicio, $_SESSION["Identificacion"], $Hora, $Dia);
    $Mensaje="Registrado";
        }
    catch (PDOException $e){
        $Mensaje="Error al registrar el Agendaservicio".$e->getMessage();
    }
    echo $Mensaje;
    
    header("Location: ../vista/Agendaservicio_listar.php?m=".$Mensaje);
}// Cierre if validación existencia de registro

else if(isset($_POST["CodigoServicio"]) and isset($_POST["Identificacion"]) and isset($_POST["Hora"]) and isset($_POST["Dia"]) and $_POST["Accion"]=="Eliminar" ){
$CodigoServicio=$_POST["CodigoServicio"];
echo $CodigoServicio;
$AgendaservicioControlador=new AgendaservicioControlador();
$Agendaservicios = $AgendaservicioControlador->eliminarAgendaservicio($CodigoServicio, $_POST["Identificacion"], $_POST["Hora"], $_POST["Dia"]);
header("Location: ../vista/Agendaservicio_listar.php?m=Eliminado");
}
else if(isset($_POST["CodigoServicio"]) and isset($_POST["Identificacion"]) and $_POST["Accion"]=="Actualizar" and isset($_POST["CodigoServicio1"]) and isset($_POST["Identificacion1"])){
/*echo "Actualizando";
echo $_POST["CodigoServicio"]."<br>";
echo $_POST["Accion"]."<br>";
echo $_POST["CodigoServicio1"]."<br>";*/
    $CodigoServicio=$_POST["CodigoServicio"]; 
    $Nombre=$_POST["Nombre"]; 
    /*echo "<br>CodigoServicio:".$CodigoServicio."<br>";
    echo "Nombre:".$Nombre."<br>";*/

    $AgendaservicioControlador = new AgendaservicioControlador();
    $Agendaservicios = $AgendaservicioControlador->actualizarAgendaservicio($CodigoServicio, $Nombre, $_POST["CodigoServicio1"], $_POST["Identificacion1"]);

    header("Location: ../vista/Agendaservicio_listar.php?m=Registrado");
    
}
?> 