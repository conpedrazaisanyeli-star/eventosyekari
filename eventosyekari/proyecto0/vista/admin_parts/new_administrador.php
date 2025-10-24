<?php
// Fragmento: formulario para registrar administrador (para cargar dentro del dashboard)
?>
<h2>Registrar Administrador</h2>
<form action="../controlador/AdministradorControlador.php" method="post">
  <!-- Cuando se envía desde el panel admin queremos volver al dashboard en la misma pestaña -->
  <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=admins">
  <label>Identificacion: <input type="text" name="Identificacion" required></label><br>
  <label>Nombre: <input type="text" name="Nombre" required></label><br>
  <label>Apellido: <input type="text" name="Apellido" required></label><br>
  <label>CargaEmpresarial: <input type="text" name="CargaEmpresarial"></label><br>
  <label>Direccion: <input type="text" name="Direccion"></label><br>
  <label>Celular: <input type="text" name="Celular"></label><br>
  <label>FechaNacimiento: <input type="date" name="FechaNacimiento"></label><br>
  <label>CorreoElectronico: <input type="email" name="CorreoElectronico" required></label><br>
  <label>Clave: <input type="text" name="Clave" required></label><br>
  <input type="submit" value="Registrar" class="admin-btn admin-btn-accent">
</form>
