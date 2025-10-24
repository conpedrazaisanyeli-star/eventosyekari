<?php
// Controlador simple para gestionar el carrito en sesión
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// Asegurar estructura de carrito
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action === 'add') {
    $code = $_POST['CodigoServicio'] ?? null;
    $name = $_POST['Nombre'] ?? 'Servicio';
    $price = floatval($_POST['Precio'] ?? 0);
    $qty = intval($_POST['Cantidad'] ?? 1);

    if (!$code) {
        header('Location: ../vista/Catalogo.php?m=Codigo ausente');
        exit;
    }

    // Si ya existe, sumar cantidad
    if (isset($_SESSION['cart'][$code])) {
        $_SESSION['cart'][$code]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$code] = [
            'code' => $code,
            'name' => $name,
            'price' => $price,
            'qty' => $qty
        ];
    }

    header('Location: ../vista/MiCarrito.php');
    exit;
}

if ($action === 'remove') {
    $code = $_POST['CodigoServicio'] ?? null;
    if ($code && isset($_SESSION['cart'][$code])) {
        unset($_SESSION['cart'][$code]);
    }
    header('Location: ../vista/MiCarrito.php');
    exit;
}

if ($action === 'clear') {
    $_SESSION['cart'] = [];
    header('Location: ../vista/MiCarrito.php');
    exit;
}

// por defecto redirigir
header('Location: ../vista/Catalogo.php');
exit;

?>
