<?php
// Fragmento: formulario para registrar cliente
?>
<h2>Registrar Cliente</h2>
<form action="../controlador/ClienteControlador.php" method="post">
  <!-- Volver al dashboard en la lista de clientes después de crear -->
  <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=clients">
  <label>Identificacion: <input type="text" name="Identificacion" required></label><br>
  <label>Nombre: <input type="text" name="Nombre" required></label><br>
  <label>Apellido: <input type="text" name="Apellido" required></label><br>
  <label>Direccion: <input type="text" name="Direccion"></label><br>
  <label>Celular: <input type="text" name="Celular"></label><br>
  <label>FechaNacimiento: <input type="date" name="FechaNacimiento"></label><br>
  <label>CorreoElectronico: <input type="email" name="CorreoElectronico" required></label><br>
  <label>Clave: <input type="text" name="Clave" required></label><br>
  <input type="submit" value="Registrar" class="admin-btn admin-btn-accent">
</form>
