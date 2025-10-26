<?php
session_start();
include("db.php");
include("AdministradorControlador.php");
include("ClienteControlador.php");

$Identificacion = isset($_POST['Identificacion']) ? trim($_POST['Identificacion']) : '';
$Clave = isset($_POST['Clave']) ? trim($_POST['Clave']) : '';

// Intentar autenticar como administrador primero
try {
    $AdministradorControlador = new AdministradorControlador();
    $Administradores = $AdministradorControlador->ConsultarAdministrador($Identificacion);
} catch (PDOException $e) {
    header("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Error al consultar administrador'));
    exit();
}

if (!empty($Administradores) && isset($Administradores[0]['Clave'])) {
    $ClaveBD = trim((string)$Administradores[0]['Clave']);
    if ($ClaveBD === $Clave) {
        // Login como administrador
        $_SESSION['Identificacion'] = $Administradores[0]['Identificacion'];
        $_SESSION['Nombre'] = $Administradores[0]['Nombre'];
        $_SESSION['Apellido'] = $Administradores[0]['Apellido'];
        $_SESSION['role'] = 'admin';
        header("Location: /eventosyekari/eventosyekari/proyecto0/vista/dashboard_admin.php?m=" . urlencode('Sesion iniciada'));
        exit();
    }
}

// Intentar autenticar como cliente
try {
    $ClienteControlador = new ClienteControlador();
    $Clientes = $ClienteControlador->ConsultarCliente($Identificacion);
} catch (PDOException $e) {
    header("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Error al consultar cliente'));
    exit();
}

if (!empty($Clientes) && isset($Clientes[0]['Clave']) && trim((string)$Clientes[0]['Clave']) === $Clave) {
    // Login como cliente
    $_SESSION['ClienteIdentificacion'] = $Clientes[0]['Identificacion'];
    $_SESSION['ClienteNombre'] = $Clientes[0]['Nombre'];
    $_SESSION['ClienteApellido'] = $Clientes[0]['Apellido'];
    $_SESSION['role'] = 'cliente';
    header("Location: /eventosyekari/eventosyekari/proyecto0/vista/Home.php?m=" . urlencode('Bienvenido'));
    exit();
}

// Si llegamos aquí, credenciales inválidas
header("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Datos incorrectos'));
exit();
?>
