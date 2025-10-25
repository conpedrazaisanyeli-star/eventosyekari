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
    header ("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=" . urlencode('Error al consultar administrador'));
    exit();
}

// Verificar existencia y credenciales
// Soportamos tanto comparaciones en texto plano (legacy) como hashes creados con password_hash
if (!empty($Administradores) && isset($Administradores[0]['Clave'])) {
    $dbClave = $Administradores[0]['Clave'];
    $passwordMatch = false;
    // Si la clave en DB parece ser un hash compatible con password_verify, probarlo
    if (strlen($dbClave) >= 60 || password_needs_rehash($dbClave, PASSWORD_DEFAULT) || password_verify($Clave, $dbClave)) {
        // intentar password_verify de forma segura
        if (@password_verify($Clave, $dbClave)) {
            $passwordMatch = true;
        }
    }
    // Fallback: comparación directa (por compatibilidad con datos en texto plano)
    if (!$passwordMatch && $dbClave === $Clave) {
        $passwordMatch = true;
    }

    if ($passwordMatch) {
    $_SESSION['Identificacion'] = $Administradores[0]['Identificacion'];
    $_SESSION['Nombre'] = $Administradores[0]['Nombre'];
    $_SESSION['Apellido'] = $Administradores[0]['Apellido'];
    // Redirigir al panel de administrador
    header ("Location: /eventosyekari/eventosyekari/proyecto0/vista/dashboard_admin.php?m=Sesion iniciada");
    exit();
    } else {
        header ("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=Datos incorrectos");
        exit();
    }
} else {
    header ("Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=Datos incorrectos");
    exit();
}

 ?>