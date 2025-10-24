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
//session_start();
require_once('../controlador/AdministradorControlador.php');

$AdministradorControlador = new AdministradorControlador();
$Administradores = $AdministradorControlador->listarAdministrador();

echo "<br><h1>Listado de Administradores</h1>";
if(isset ($_GET["m"])){echo "<h3>" .$_GET["m"]. "</h3>" ;}
echo "<table border='1'>

        <tr>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CargaEmpresarial</th>
            <th>Direccion</th>
            <th>Celular</th>
            <th>FechaNacimiento</th>
            <th>CorreoElectronico</th>
            <th>Clave</th>
            <th colspan='2'>Acciones</th>
        </tr>";
foreach ($Administradores as $Administrador) {
    echo "<tr>
            <td>{$Administrador['Identificacion']}</td>
            <td>{$Administrador['Nombre']}</td>
            <td>{$Administrador['Apellido']}</td>
            <td>{$Administrador['CargaEmpresarial']}</td>
            <td>{$Administrador['Direccion']}</td>
            <td>{$Administrador['Celular']}</td>
            <td>{$Administrador['FechaNacimiento']}</td>
            <td>{$Administrador['CorreoElectronico']}</td>
            <td>{$Administrador['Clave']}</td>
          <td>";
          if(isset($_SESSION["Identificacion"])) {
echo "<form action='../Controlador/AdministradorControlador.php' method='POST'>
    <input type='hidden' name='Identificacion' value='{$Administrador['Identificacion']}'>
    <input type='hidden' name='Accion' value='Eliminar'>
    <input type='submit' name='Eliminar' value='Eliminar' onclick='return confirmar()'>   
    </form>";}
else {echo "debe iniciar sesion";}
    echo "</td>

    <td>
    <form action='../vista/ActualizarAdministrador.php' method='POST'>
    <input type='hidden' name='Identificacion' value='{$Administrador['Identificacion']}'>
    <input type='hidden' name='Accion' value='Actualizar'>
    <input type='submit' name='Actualizar' value='Actualizar'>   
    </form>
</td>
</tr>";

}
echo "</table>";
?>


 