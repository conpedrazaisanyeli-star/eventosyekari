<?php
// Procesa un pago simulado: valida carrito y limpia sesión
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header('Location: ../vista/MiCarrito.php?m=Carrito vacío');
    exit;
}

$nombre = trim($_POST['cliente_nombre'] ?? '');
$email = trim($_POST['cliente_email'] ?? '');
$telefono = trim($_POST['cliente_telefono'] ?? '');
$total = floatval($_POST['total_amount'] ?? 0);

// Aquí podrías integrar una pasarela real (PayU, PayPal, Stripe). Por ahora simulamos éxito.

// Generar ID de pedido simple
$orderId = uniqid('order_');

// Guardar resumen en sesión (simulado)
$_SESSION['last_order'] = [
    'id' => $orderId,
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $telefono,
    'items' => $cart,
    'total' => $total,
    'status' => 'paid',
    'created_at' => date('c'),
];

// Limpiar carrito
$_SESSION['cart'] = [];

// Redirigir a página de éxito
header('Location: ../vista/CheckoutSuccess.php?order=' . urlencode($orderId));
exit;

?>
