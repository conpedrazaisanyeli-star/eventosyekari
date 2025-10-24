<?php
// Fragmento: editar administrador — cargado dentro del dashboard con GET ?page=edit_admin&Identificacion=...
require_once(__DIR__ . '/../../controlador/AdministradorControlador.php');
$id = isset($_GET['Identificacion']) ? $_GET['Identificacion'] : null;
$datos = null;
if ($id) {
    $ctrl = new AdministradorControlador();
    $resultado = $ctrl->Consultaradministrador($id);
    // Consultaradministrador puede devolver un array o un registro
    if (is_array($resultado) && count($resultado) > 0) {
        // si devuelve lista, tomar el primero
        $datos = $resultado[0];
    } elseif (is_array($resultado)) {
        $datos = $resultado;
    }
}
?>
<h2>Editar Administrador</h2>
<?php if (!$datos): ?>
  <p>No se encontró el administrador con identificación <?php echo htmlspecialchars($id); ?></p>
<?php else: ?>
  <form action="../controlador/AdministradorControlador.php" method="post">
    <input type="hidden" name="Accion" value="Actualizar">
    <input type="hidden" name="Identificacion1" value="<?php echo htmlspecialchars($datos['Identificacion']); ?>">
    <!-- volver al dashboard en la lista de administradores -->
    <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=admins">

    <label>Identificacion: <input type="text" name="Identificacion" value="<?php echo htmlspecialchars($datos['Identificacion']); ?>" required></label><br>
    <label>Nombre: <input type="text" name="Nombre" value="<?php echo htmlspecialchars($datos['Nombre']); ?>" required></label><br>
    <label>Apellido: <input type="text" name="Apellido" value="<?php echo htmlspecialchars($datos['Apellido']); ?>" required></label><br>
    <label>CargaEmpresarial: <input type="text" name="CargaEmpresarial" value="<?php echo htmlspecialchars($datos['CargaEmpresarial'] ?? ''); ?>"></label><br>
    <label>Direccion: <input type="text" name="Direccion" value="<?php echo htmlspecialchars($datos['Direccion'] ?? ''); ?>"></label><br>
    <label>Celular: <input type="text" name="Celular" value="<?php echo htmlspecialchars($datos['Celular'] ?? ''); ?>"></label><br>
    <label>FechaNacimiento: <input type="date" name="FechaNacimiento" value="<?php echo htmlspecialchars($datos['FechaNacimiento'] ?? ''); ?>"></label><br>
    <label>CorreoElectronico: <input type="email" name="CorreoElectronico" value="<?php echo htmlspecialchars($datos['CorreoElectronico'] ?? ''); ?>" required></label><br>
    <label>Clave: <input type="text" name="Clave" value="<?php echo htmlspecialchars($datos['Clave'] ?? ''); ?>" required></label><br>

    <input type="submit" value="Guardar cambios" class="admin-btn admin-btn-primary">
  </form>
<?php endif; ?>
