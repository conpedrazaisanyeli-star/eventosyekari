<?php
session_start();
include("db.php");
include("AdministradorControlador.php");

$Identificacion = isset($_POST['Identificacion']) ? trim($_POST['Identificacion']) : '';
$Clave = isset($_POST['Clave']) ? trim($_POST['Clave']) : '';

try {
    // Crear el objeto AdministradorControlador para consultar la BD
    $AdministradorControlador = new AdministradorControlador();
    $Administradores = $AdministradorControlador->ConsultarAdministrador($Identificacion);
} catch (PDOException $e){
    // En caso de error de BD redirigimos al login con mensaje
    header("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Error al consultar administrador'));
    exit();
}

// --- Normalización de valores ---
if (!empty($Administradores) && isset($Administradores[0]['Clave'])) {
    $ClaveBD = trim((string)$Administradores[0]['Clave']); // Elimina espacios y convierte a string
    $ClavePOST = trim((string)$Clave);

    if ($ClaveBD == $ClavePOST) { // Comparación normalizada
        $_SESSION['Identificacion'] = $Administradores[0]['Identificacion'];
        $_SESSION['Nombre'] = $Administradores[0]['Nombre'];
        $_SESSION['Apellido'] = $Administradores[0]['Apellido'];

        // Redirigir al panel de administrador
        header("Location: /eventosyekari/eventosyekari/proyecto0/vista/dashboard_admin.php?m=" . urlencode('Sesion iniciada'));
        exit();
    }
}

// Si llega aquí, las credenciales no coinciden
header("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Datos incorrectos'));
exit();
?>
