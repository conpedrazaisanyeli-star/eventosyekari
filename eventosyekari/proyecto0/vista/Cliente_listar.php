<link rel="stylesheet" href="../css/Estilos.css">
<script>
    function confirmar(){
        var respuesta = confirm ("desea borrar su registro")
        if(respuesta == true)
            { return true; }
        else {return false; }
        }
    </script>

<?php
session_start();
require_once("../vista/menu.php"); 
require_once('../controlador/ClienteControlador.php');

$ClienteControlador = new ClienteControlador();
$Clientes = $ClienteControlador->listarCliente();

echo "<br><h1>Listado de Clientes</h1>";
if(isset ($_GET["m"])){echo "<h3>" .$_GET["m"]. "</h3>" ;}
echo "<table border='1'>

        <tr>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Celular</th>
            <th>FechaNacimiento</th>
            <th>CorreoElectronico</th>
            <th>Clave</th>
            <th colspan='2'>Acciones</th>
        </tr>";
foreach ($Clientes as $Cliente) {
    echo "<tr>
            <td>{$Cliente['Identificacion']}</td>
            <td>{$Cliente['Nombre']}</td>
            <td>{$Cliente['Apellido']}</td>
            <td>{$Cliente['Direccion']}</td>
            <td>{$Cliente['Celular']}</td>
            <td>{$Cliente['FechaNacimiento']}</td>
            <td>{$Cliente['CorreoElectronico']}</td>
            <td>{$Cliente['Clave']}</td>
          <td>";
          if(isset($_SESSION["Identificacion"])) {
echo "<form action='../Controlador/ClienteControlador.php' method='POST'>
    <input type='hidden' name='Identificacion' value='{$Cliente['Identificacion']}'>
    <input type='hidden' name='Accion' value='Eliminar'>
    <input type='submit' name='Eliminar' value='Eliminar' onclick='return confirmar()'>   
    </form>";}
    else {echo "debe iniciar sesion";}
    echo "</td>

    <td>
    <form action='../vista/ActualizarCliente.php' method='POST'>
    <input type='hidden' name='Identificacion' value='{$Cliente['Identificacion']}'>
    <input type='hidden' name='Accion' value='Actualizar'>
    <input type='submit' name='Actualizar' value='Actualizar'>   
    </form>
</td>
</tr>";

}
echo "</table>";
?>

