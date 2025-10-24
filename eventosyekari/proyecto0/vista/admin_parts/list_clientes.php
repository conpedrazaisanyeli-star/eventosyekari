<?php
// Fragmento: lista de clientes
require_once(__DIR__ . '/../../controlador/ClienteControlador.php');
$ClienteControlador = new ClienteControlador();
$Clientes = $ClienteControlador->listarCliente();
?>
<h2>Listado de Clientes</h2>
<?php if(isset($_GET['m'])): ?><div class="admin-message"><?php echo htmlspecialchars($_GET['m']); ?></div><?php endif; ?>
<table border="1" cellpadding="6" cellspacing="0">
<tr>
  <th>Identificacion</th>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Celular</th>
  <th>Correo</th>
  <th>Acciones</th>
</tr>
<?php foreach($Clientes as $Cliente): ?>
<tr>
  <td><?php echo htmlspecialchars($Cliente['Identificacion']); ?></td>
  <td><?php echo htmlspecialchars($Cliente['Nombre']); ?></td>
  <td><?php echo htmlspecialchars($Cliente['Apellido']); ?></td>
  <td><?php echo htmlspecialchars($Cliente['Celular']); ?></td>
  <td><?php echo htmlspecialchars($Cliente['CorreoElectronico']); ?></td>
  <td>
    <form action="../controlador/ClienteControlador.php" method="post" style="display:inline">
      <input type="hidden" name="Identificacion" value="<?php echo htmlspecialchars($Cliente['Identificacion']); ?>">
      <input type="hidden" name="Accion" value="Eliminar">
      <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=clients">
      <input type="submit" value="Eliminar" class="admin-btn admin-btn-danger" onclick="return confirm('¿Eliminar cliente?')">
    </form>
    <form action="dashboard_admin.php" method="get" style="display:inline">
      <input type="hidden" name="page" value="edit_client">
      <input type="hidden" name="Identificacion" value="<?php echo htmlspecialchars($Cliente['Identificacion']); ?>">
      <input type="submit" value="Actualizar" class="admin-btn admin-btn-primary">
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>