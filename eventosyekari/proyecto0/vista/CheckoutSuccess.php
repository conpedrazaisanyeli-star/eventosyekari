<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

$orderId = $_GET['order'] ?? null;
$order = $_SESSION['last_order'] ?? null;

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido confirmado</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <style>.order-wrap{max-width:900px;margin:2rem auto;padding:1rem}</style>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

<main class="order-wrap container">
    <h1>Gracias por tu pedido</h1>

    <?php if (!$order || ($orderId && $order['id'] !== $orderId)): ?>
        <p>No se encontró información del pedido en la sesión. Si acabas de pagar, revisa la sección "Mi carrito" o intenta nuevamente.</p>
        <p><a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php">Volver al inicio</a></p>
    <?php else: ?>
        <p>Pedido <strong><?= e($order['id']) ?></strong> procesado con estado <strong><?= e($order['status']) ?></strong>.</p>
        <dl>
            <dt>Nombre</dt><dd><?= e($order['nombre']) ?></dd>
            <dt>Correo</dt><dd><?= e($order['email']) ?></dd>
            <dt>Teléfono</dt><dd><?= e($order['telefono']) ?></dd>
            <dt>Fecha</dt><dd><?= e($order['created_at']) ?></dd>
            <dt>Total</dt><dd>$<?= number_format($order['total'] ?? 0,2,',','.') ?></dd>
        </dl>

        <h2>Artículos</h2>
        <?php if (!empty($order['items'])): ?>
            <ul>
            <?php foreach ($order['items'] as $it): ?>
                <li><?= e($it['qty']) ?> × <?= e($it['name']) ?> — $<?= number_format($it['price'],2,',','.') ?></li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay artículos registrados en el pedido.</p>
        <?php endif; ?>

        <p><a href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php">Volver al inicio</a> | <a href="/eventosyekari/eventosyekari/proyecto0/vista/Catalogo.php">Ver más servicios</a></p>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$orderId = $_GET['order'] ?? null;
$order = $_SESSION['last_order'] ?? null;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pago exitoso - Eventos Yekari</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main class="container">
    <h1 class="section-title">¡Pago recibido!</h1>
    <?php if ($order && $order['id'] === $orderId): ?>
        <p>Gracias, <?php echo htmlspecialchars($order['nombre']); ?>. Tu pedido <strong><?php echo htmlspecialchars($order['id']); ?></strong> se procesó correctamente.</p>
        <p>Total: $<?php echo number_format($order['total'],0,',','.'); ?></p>
        <h3>Resumen:</h3>
        <ul>
        <?php foreach($order['items'] as $it){ echo '<li>'.htmlspecialchars($it['name']).' x'.$it['qty'].'</li>'; } ?>
        </ul>
        <p>Se ha enviado un correo de confirmación a: <?php echo htmlspecialchars($order['email']); ?></p>
    <?php else: ?>
        <p>No se encontró información del pedido. Si acabas de pagar, espera unos segundos o contacta al soporte.</p>
    <?php endif; ?>
    <p><a class="cta" href="/eventosyekari/eventosyekari/proyecto0/vista/Home.php">Volver al inicio</a></p>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
