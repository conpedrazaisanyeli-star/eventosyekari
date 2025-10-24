<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once __DIR__ . '/../controlador/CartController.php'; // no side-effects; just for reference

$cart = $_SESSION['cart'] ?? [];

function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

// calcular total
$total = 0.0;
foreach ($cart as $c) {
    $total += ($c['price'] ?? 0) * ($c['qty'] ?? 1);
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Pago</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <style>
        .checkout { max-width:800px;margin:2rem auto;padding:1rem }
        .cart-row{display:flex;justify-content:space-between;padding:.5rem 0;border-bottom:1px solid #eee}
        .cart-summary{margin-top:1rem;text-align:right}
        form .row{display:flex;gap:.5rem;flex-wrap:wrap}
        label{display:block;margin-bottom:.25rem}
    </style>
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

<main class="checkout container">
    <h1>Checkout</h1>

    <?php if (empty($cart)): ?>
        <p>Tu carrito está vacío. <a href="Catalogo.php">Ir al catálogo</a></p>
    <?php else: ?>
        <section aria-labelledby="order-summary">
            <h2 id="order-summary">Resumen del pedido</h2>
            <?php foreach ($cart as $item): ?>
                <div class="cart-row">
                    <div>
                        <strong><?= e($item['name']) ?></strong>
                        <div class="muted">Código: <?= e($item['code']) ?></div>
                    </div>
                    <div><?= e($item['qty']) ?> × $<?= number_format($item['price'],2,',','.') ?></div>
                </div>
            <?php endforeach; ?>
            <div class="cart-summary">
                <strong>Total: $<?= number_format($total,2,',','.') ?></strong>
            </div>
        </section>

        <section aria-labelledby="payment-form">
            <h2 id="payment-form">Información de pago (simulado)</h2>
            <form method="post" action="/eventosyekari/eventosyekari/proyecto0/controlador/PagoSimulado.php">
                <input type="hidden" name="total_amount" value="<?= e($total) ?>">
                <div class="row">
                    <div style="flex:1;min-width:220px">
                        <label for="cliente_nombre">Nombre completo</label>
                        <input id="cliente_nombre" name="cliente_nombre" required>
                    </div>
                    <div style="flex:1;min-width:220px">
                        <label for="cliente_email">Correo electrónico</label>
                        <input id="cliente_email" name="cliente_email" type="email" required>
                    </div>
                    <div style="flex:1;min-width:160px">
                        <label for="cliente_telefono">Teléfono</label>
                        <input id="cliente_telefono" name="cliente_telefono" required>
                    </div>
                </div>
                <p style="margin-top:1rem">Este es un pago simulado. Al enviar se procesará y verás la confirmación.</p>
                <button type="submit" class="btn-primary">Pagar $<?= number_format($total,2,',','.') ?></button>
            </form>
        </section>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header('Location: MiCarrito.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Eventos Yekari</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main class="container">
    <h1 class="section-title">Pagar</h1>
    <form action="/eventosyekari/eventosyekari/proyecto0/controlador/PagoSimulado.php" method="post">
        <label>Nombre completo:<br><input type="text" name="cliente_nombre" required></label><br><br>
        <label>Correo:<br><input type="email" name="cliente_email" required></label><br><br>
        <label>Teléfono:<br><input type="tel" name="cliente_telefono"></label><br><br>
        <h3>Resumen</h3>
        <ul>
        <?php $total=0; foreach($cart as $it){ $subtotal=$it['price']*$it['qty']; $total+=$subtotal; echo '<li>'.htmlspecialchars($it['name']).' x'.$it['qty'].' - $'.number_format($subtotal,0,',','.').'</li>'; } ?>
        </ul>
        <h3>Total: $<?php echo number_format($total,0,',','.'); ?></h3>
        <input type="hidden" name="total_amount" value="<?php echo htmlspecialchars($total); ?>">
        <button class="btn btn-primary" type="submit">Pagar (Simulado)</button>
    </form>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
