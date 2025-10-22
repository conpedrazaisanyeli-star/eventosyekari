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
require_once('../controlador/AdministradorControlador.php');

$AdministradorControlador = new AdministradorControlador();
$Abministradores = $AdministradorControlador->listarAdministrador();

echo "<br><h1>Asignacion de Abministradores (agregar a carrito servicios)</h1>";
if(isset($_GET["m"])){echo "<h3>".$_GET["m"]."</h3>";}
echo "<table border='1'><tr><th>Codigo Servicio</th><th>Nombre</th><th>Imagen</th><th>Dia</th><th>Hora</th><th>Acciones</th></tr>";
foreach($Abministradores as $Abministrador){
    echo "<tr><td>{$Abministrador['Identificacion']}</td>
    <td>{$Abministrador['Nombre']}</td>
    <td><form action='../controlador/AgendaserviciosControlador.php' method='POST'>
        <select name='Dia' id='Dia'>
        <option value=''>--Escoja el dia--</option>
        <option value='1'>Lunes</option>
        <option value='2'>Martes</option>
        <option value='3'>Miercoles</option>
        <option value='4'>Jueves</option>
        <option value='5'>Viernes</option>
        <option value='6'>Sabado</option>
        <option value='7'>Domingo</option>
        </select>
    </td>
      <td><select name='Hora' id='Hora'>
        <option value=''>--Escoja la hora--</option>
        <option value='1'>6:15-7:10</option>
        <option value='2'>7:10-8:00</option>
        <option value='3'>8:00-8:50</option>
        <option value='4'>8:50-9:40</option>
        <option value='5'>10:20-11:10</option>
        <option value='6'>11:10-12:00</option>
        </select>
    </td>
    
    <td>";
        if(isset($_SESSION["Identificacion"])) {
        echo "
        <input type='hidden' name='CodigoServicio' value='{$Abministrador['CodigoServicio']}'>
        <input type='hidden' name='Accion' value='AgregarCarrito'>
        <input type='submit' name='AgregarCarrito' value='AgregarCarrito'>
        </form>";}
        else {echo "Debe iniciar sesion";}
    echo "</td>
    </tr>";
}
echo "</table>";
?>