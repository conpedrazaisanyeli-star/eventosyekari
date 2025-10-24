<?php
// Fragmento: lista de administradores (para cargar dentro del dashboard)
require_once(__DIR__ . '/../../controlador/AdministradorControlador.php');
$AdministradorControlador = new AdministradorControlador();
$Administradores = $AdministradorControlador->listarAdministrador();
?>
<h2>Listado de Administradores</h2>
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
<?php foreach($Administradores as $Administrador): ?>
<tr>
  <td><?php echo htmlspecialchars($Administrador['Identificacion']); ?></td>
  <td><?php echo htmlspecialchars($Administrador['Nombre']); ?></td>
  <td><?php echo htmlspecialchars($Administrador['Apellido']); ?></td>
  <td><?php echo htmlspecialchars($Administrador['Celular']); ?></td>
  <td><?php echo htmlspecialchars($Administrador['CorreoElectronico']); ?></td>
  <td>
    <form action="../controlador/AdministradorControlador.php" method="post" style="display:inline">
      <input type="hidden" name="Identificacion" value="<?php echo htmlspecialchars($Administrador['Identificacion']); ?>">
      <input type="hidden" name="Accion" value="Eliminar">
      <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=admins">
      <input type="submit" value="Eliminar" class="admin-btn admin-btn-danger" onclick="return confirm('¿Eliminar administrador?')">
    </form>
    <form action="dashboard_admin.php" method="get" style="display:inline">
      <input type="hidden" name="page" value="edit_admin">
      <input type="hidden" name="Identificacion" value="<?php echo htmlspecialchars($Administrador['Identificacion']); ?>">
      <input type="submit" value="Actualizar" class="admin-btn admin-btn-primary">
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>
