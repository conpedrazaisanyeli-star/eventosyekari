<?php
// Header reutilizable para el sitio - incluye navegación y marca
?>
<header class="site-header">
    <!-- Barra de navegación principal -->
    <!-- estilos adicionales para el menú -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/menu.css">
    <nav class="nav" aria-label="Menú principal">
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php#inicio">Inicio</a>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/nuestraHistoria.php">Nuestra Historia</a>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php#servicios">Servicios</a>
    <a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php#servicios">Catálogo</a>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/MiCarrito.php">Carrito</a>
        <a class="btn-login" href="/eventosyekari/eventosyekari/proyecto0/vista/login.php">Iniciar sesión</a>
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
