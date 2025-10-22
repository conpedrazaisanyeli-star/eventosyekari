<link rel="stylesheet" href="../css/Estilos.css">

<script>
    function confirmar(){
        var respuesta = confirm("Desea borrar el registro?")
        if(respuesta == true)
            { return true;  }
        else { return false;   }
    }
</script>

<?php
//session_start();
include_once("../vista/menu.php");
require_once('../controlador/AgendaservicioControlador.php');

$AgendaservicioControlador = new AgendaservicioControlador();
$Agendaservicios = $AgendaservicioControlador->listarAgendaservicio();

echo "<br><h1>Listado de Agendaservicios (ver carrito servicios)</h1>";
if(isset($_GET["m"])){echo "<h3>".$_GET["m"]."</h3>";}
echo "<table border='1'><tr><th>Codigo Servicio</th><th>Imagen</th><th>Nombre</th><th>Dia</th><th>Hora</th><th colspan='2'>Acciones</th></tr>";
foreach($Agendaservicios as $Agendaservicio){
    echo "<tr><td>{$Agendaservicio['Nombrservicio']}</td>
    <td><img src='../imagenes/{$Agendaservicio['Imagen']}' alt='{$Agendaservicio['Imagen']}' width='100' height='100'></td>
    <td>{$Agendaservicio['Nombres']}</td>
    <td>";
    echo $Dias[$Agendaservicio['Dia']-1];
        
    echo "</td>
      <td>";
      echo $Horas[$Agendaservicio['Hora']-1];
       
    echo "</td>
    <td>";
        if(isset($_SESSION["Identificacion"])) {
        echo "<form action='../controlador/AgendaservicioControlador.php' method='POST'>
        <input type='hidden' name='Identificacion' value='{$Agendaservicio['Identificacion']}'>
        <input type='hidden' name='CodigoServicio' value='{$Agendaservicio['CodigoServicio']}'>
        <input type='hidden' name='Hora' value='{$Agendaservicio['Hora']}'>
        <input type='hidden' name='Dia' value='{$Agendaservicio['Dia']}'>
        <input type='hidden' name='Accion' value='Eliminar'>
        <input type='submit' name='Eliminar' value='Eliminar' onclick='return confirmar()'>
        </form>";}
        else {echo "Debe iniciar sesion";}
    echo "</td>
    <td>
        <form action='../vista/ActualizarAgendaservicio.php' method='POST'>
        <input type='hidden' name='Identificacion' value='{$Agendaservicio['Identificacion']}'>
        <input type='hidden' name='CodigoServicio' value='{$Agendaservicio['CodigoServicio']}'>
        <input type='hidden' name='Hora' value='{$Agendaservicio['Hora']}'>
        <input type='hidden' name='Dia' value='{$Agendaservicio['Dia']}'>        
        <input type='hidden' name='Accion' value='Actualizar'>
        <input type='submit' name='Actualizar' value='Actualizar'>
        </form>
    </td>
    </tr>";
}
echo "</table>";
?>