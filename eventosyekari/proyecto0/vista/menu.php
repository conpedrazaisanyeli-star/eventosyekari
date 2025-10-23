<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    // Mostrar datos del usuario si está logueado
    if(isset($_SESSION["Identificacion"])) {
        echo "<h6>".htmlspecialchars($_SESSION['Identificacion'])." - ";
        echo htmlspecialchars($_SESSION['Nombre'])." - ";
        echo htmlspecialchars($_SESSION['Apellido'])."</h6>";
    }
?>

<nav id="menu">
    <ul>
        <li><a href="/eventosyekari/eventosyekari/proyecto0/index.php">Inicio</a></li>
        <li>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/Administrador_listar.php">Listar administrador</a>
            <ul>
                <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/InsertarAdministrador.php">Registrar administrador</a></li>
            </ul>
        </li>
    </ul>

    <ul>
        <li>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/Agendaservicio_listar.php">Servicios (ver carrito)</a>
            <ul>
                <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/Carrito.php">Asignar servicio (agregarCarrito)</a></li>
            </ul>
        </li>
    </ul>

    <ul>
        <li>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/Cliente_listar.php">Listar cliente</a>
            <ul>
                <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/InsertarCliente.php">Registrar Clientes</a></li>
            </ul>
        </li>
    </ul>

    <ul>
        <?php if(!isset($_SESSION["Identificacion"])): ?>
            <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/login.php">Iniciar sesión</a></li>
        <?php else: ?>
            <li><a class="btn-logout" href="/eventosyekari/eventosyekari/proyecto0/vista/logout.php">Cerrar sesión</a></li>
        <?php endif; ?>
    </ul>
</nav>
