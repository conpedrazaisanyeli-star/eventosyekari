<?php
session_start();
// requerir que el admin esté logueado (ajusta la clave de sesión si usas otra)
if(!isset($_SESSION['Identificacion'])){
    header('Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=Debe iniciar sesión');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Panel administrador - Eventos Yekari</title>
</head>
<body>

<h1>Panel de administrador</h1>
<p>Bienvenido, <?php echo htmlspecialchars($_SESSION['Identificacion']); ?> | <a href="logout.php">Cerrar sesión</a></p>

<ul>
  <li><a href="Administrador_listar.php">Listar administradores</a></li>
  <li><a href="InsertarAdministrador.php">Registrar administrador</a></li>
  <li><a href="Cliente_listar.php">Listar clientes</a></li>
  <li><a href="InsertarCliente.php">Registrar cliente</a></li>
  <li><a href="Ordenes_listar.php">Listar órdenes</a></li>
</ul>

</body>
</html>
