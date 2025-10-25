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
  <!-- Enlazar estilos principales y del admin -->
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
</head>
<body>

<?php // header omitido para vista del panel (se renderiza sólo el panel) ?>

<?php
// Determinar qué fragmento cargar (antes de dibujar sidebar para marcar activo)
// NOTA: dejar vacío por defecto para que al entrar no cargue inmediatamente
// el listado de administradores. El listado se carga sólo cuando se pasa
// ?page=admins explícitamente.
$page = isset($_GET['page']) ? $_GET['page'] : null;

// Calcular iniciales para avatar
$initials = '';
if (isset($_SESSION['Nombre']) || isset($_SESSION['Apellido'])) {
    $n = isset($_SESSION['Nombre']) ? trim($_SESSION['Nombre']) : '';
    $a = isset($_SESSION['Apellido']) ? trim($_SESSION['Apellido']) : '';
    $initials = strtoupper(substr($n,0,1) . substr($a,0,1));
} else {
    $initials = substr($_SESSION['Identificacion'], 0, 2);
}
?>

<div class="admin-dashboard container">

  <aside class="admin-sidebar">
    <div class="admin-avatar"><span class="initials"><?php echo htmlspecialchars($initials); ?></span></div>
    <div class="admin-profile-name"><?php echo htmlspecialchars($_SESSION['Nombre'] ?? $_SESSION['Identificacion']); ?></div>
    <div class="admin-profile-role">Administrador</div>

    <ul class="admin-nav" role="navigation" aria-label="Navegación administrativa">
      <li><a class="<?php echo $page=='admins' ? 'active':''; ?>" href="?page=admins">Administradores</a></li>
      <li><a class="<?php echo $page=='new_admin' ? 'active':''; ?>" href="?page=new_admin">Registrar admin</a></li>
  <li><a class="<?php echo $page=='clients' ? 'active':''; ?>" href="?page=clients">Clientes</a></li>
      <li><a class="<?php echo $page=='new_client' ? 'active':''; ?>" href="?page=new_client">Registrar cliente</a></li>
  <li><a class="<?php echo $page=='services' ? 'active':''; ?>" href="?page=services">Servicios</a></li>
      <li><a class="<?php echo $page=='orders' ? 'active':''; ?>" href="?page=orders">Órdenes</a></li>
      <li><a class="" href="logout.php">Cerrar sesión</a></li>
    </ul>
  </aside>

  <main class="admin-main">
    <div class="welcome-banner">¡Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre'] ?? $_SESSION['Identificacion']); ?> — gestiona usuarios, clientes e información desde aquí.</div>

    <div class="admin-cards">
      <a class="admin-card card-pedidos" href="?page=orders"><div class="card-icon">📦</div><h3>Pedidos</h3><p>Ver y gestionar pedidos</p></a>
  <a class="admin-card card-clientes" href="?page=clients"><div class="card-icon">👥</div><h3>Clientes</h3><p>Gestiona la lista de clientes</p></a>
  <a class="admin-card card-servicios" href="?page=services"><div class="card-icon">🛍️</div><h3>Servicios</h3><p>Agregar / editar servicios</p></a>
  <a class="admin-card card-inventario" href="?page=admins"><div class="card-icon">📦</div><h3>Administradores</h3><p>Control de administradores</p></a>
  <a class="admin-card card-modificar" href="?page=new_admin"><div class="card-icon">✏️</div><h3>Registrar</h3><p>Crear nuevo registro</p></a>
      <a class="admin-card card-logout" href="logout.php"><div class="card-icon">⏻</div><h3>Cerrar sesión</h3><p>Salir del panel</p></a>
    </div>

    <section id="admin-content" style="margin-top:1rem">
    <?php
    switch($page){
      case 'new_admin':
        include_once(__DIR__ . '/admin_parts/new_administrador.php');
        break;
      case 'edit_admin':
        include_once(__DIR__ . '/admin_parts/editar_administrador.php');
        break;
      case 'clients':
        include_once(__DIR__ . '/admin_parts/list_clientes.php');
        break;
      case 'new_client':
        include_once(__DIR__ . '/admin_parts/new_cliente.php');
        break;
      case 'orders':
        include_once(__DIR__ . '/admin_parts/list_orders.php');
        break;
      case 'services':
        include_once(__DIR__ . '/admin_parts/list_servicios.php');
        break;
      case 'new_service':
        include_once(__DIR__ . '/admin_parts/new_servicio.php');
        break;
      case 'edit_service':
        include_once(__DIR__ . '/admin_parts/editar_servicio.php');
        break;
      case 'edit_client':
        include_once(__DIR__ . '/admin_parts/editar_cliente.php');
        break;
      case 'admins':
        include_once(__DIR__ . '/admin_parts/list_administradores.php');
        break;
      case null:
      default:
        // Pantalla inicial del panel: mostrar mensaje de bienvenida y guía
        ?>
        <div class="admin-panel-large">
          <h2>Panel de administración</h2>
          <p>Selecciona una tarjeta del panel superior para comenzar. Aquí puedes gestionar administradores, clientes y ver pedidos.</p>
          <div style="margin-top:1rem; display:flex; gap:0.7rem; flex-wrap:wrap;">
            <a class="admin-card" href="?page=orders">Ver pedidos</a>
            <a class="admin-card" href="?page=clients">Lista de clientes</a>
            <a class="admin-card" href="?page=new_admin">Registrar admin</a>
          </div>
        </div>
        <?php
        break;
    }
    ?>
    </section>

  </main>

</div>

</body>
</html>
