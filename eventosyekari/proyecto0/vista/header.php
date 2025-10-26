<?php
// Header reutilizable para el sitio - incluye navegación y marca
if (session_status() == PHP_SESSION_NONE) session_start();
$cart_count = 0;
if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
    foreach($_SESSION['carrito'] as $it) $cart_count += isset($it['cantidad']) ? intval($it['cantidad']) : 0;
}

// Mostrar el enlace de carrito sólo cuando estemos en la página de catálogo.
// Usamos REQUEST_URI para detectar 'catalogo' en la ruta. Si necesitas otra
// condición (por ejemplo un parámetro distinto), puedo ajustarlo.
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$show_cart = (strpos($request_uri, 'catalogo') !== false) || (strpos($request_uri, '/vista/catalogo') !== false);
?>
<header class="site-header">
    <!-- Barra de navegación principal -->
    <!-- estilos adicionales para el menú -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/menu.css">
    <nav class="nav" aria-label="Menú principal">
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php#inicio">Inicio</a>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/nuestraHistoria.php">Nuestra Historia</a>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/catalogo.php">Servicios</a>
        <?php if($show_cart): ?>
            <a href="/eventosyekari/eventosyekari/proyecto0/controlador/CarritoControlador.php?accion=listar">Carrito (<?php echo $cart_count; ?>)</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/dashboard_admin.php">Panel admin</a>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/logout.php">Cerrar sesión</a>
        <?php elseif(isset($_SESSION['role']) && $_SESSION['role'] === 'cliente'): ?>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/cliente_panel.php">Mi cuenta</a>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a class="btn-login" href="/eventosyekari/eventosyekari/proyecto0/vista/login.php">Iniciar sesión</a>
        <?php endif; ?>
    </nav>

    <!-- Bloque de marca: logo y nombre de la empresa -->
    <div class="brand">
        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/logo.png" alt="Logo Eventos Yekari" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=48 height=48><rect width=48 height=48 fill=%23FF6666/><text x=50% y=50% dominant-baseline=middle text-anchor=middle fill=%23fff font-size=18>EY</text></svg>'">
        <div>
            <div style="font-weight:700">Eventos Yekari</div>
            <small>Creando recuerdos</small>
        </div>
    </div>
</header>
