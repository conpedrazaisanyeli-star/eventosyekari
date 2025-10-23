<?php
   // session_start();
       //el dato que quiera mostrar si ya esta logueado
       if(isset($_SESSION["Identificacion"])) {
            echo "<h6>".$_SESSION['Identificacion']." - ";
            echo $_SESSION['Nombres']." - ";
            echo $_SESSION['Apellidos']."</h6>";}
    ?>

<nav id="menu">
<ul>
    <li><a href="/eventosyekari/eventosyekari/proyecto0/index.php">inicio</a></li>
    <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/Administrador_listar.php"> listar administrador</a>
        <ul>
           <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/InsertarAdministrador.php">Registrar administrador</a></li>
    </ul>  
    </li>
</ul>

<ul>
<li>
        <a href="/eventosyekari/eventosyekari/proyecto0/vista/Agendaservicio_listar.php">servicios<br>(vercarrito)</a>
        <ul>
            <li>
                <a href="/eventosyekari/eventosyekari/proyecto0/vista/Carrito.php"> asignar servicio <br>(agregarCarrito)</a>
            </li>
        </ul>
</li>
</ul>

    
<ul>
    <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/Cliente_listar.php"> listar cliente</a>
        <ul>
           <li><a href="/eventosyekari/eventosyekari/proyecto0/vista/InsertarCliente.php">Registrar Clientes</a></li>
    </ul>
    </li>
</ul>

<ul>
<?php if(!isset($_SESSION["Identificacion"])) {echo '<li><a href="/eventosyekari/proyecto0/vista/login.php"> Iniciar sesion</a><li>';}
else { echo '<li><a href="/eventosyekari/proyecto0/vista/logout.php"> Cerrar sesion</a><li>';}?>
</ul>
<nav>
