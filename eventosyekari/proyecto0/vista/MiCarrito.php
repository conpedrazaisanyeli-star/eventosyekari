<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Carrito - Eventos Yekari</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main class="container">
    <h1 class="section-title">Mi Carrito</h1>

    <?php
    $cart = $_SESSION['cart'] ?? [];
    if (empty($cart)) {
        echo '<p>Tu carrito está vacío. <a href="Catalogo.php">Ver catálogo</a></p>';
    } else {
        echo '<table style="width:100%;border-collapse:collapse">';
        echo '<thead><tr><th>Servicio</th><th>Precio</th><th>Cant</th><th>Subtotal</th><th>Acciones</th></tr></thead><tbody>';
        $total = 0;
        foreach ($cart as $code => $it) {
            $subtotal = $it['price'] * $it['qty'];
            $total += $subtotal;
            echo '<tr style="border-bottom:1px solid #ddd">';
            echo '<td>' . htmlspecialchars($it['name']) . '</td>';
            echo '<td>' . (is_numeric($it['price'])? '$'.number_format($it['price'],0,',','.') : htmlspecialchars($it['price'])) . '</td>';
            echo '<td>' . intval($it['qty']) . '</td>';
            echo '<td>$' . number_format($subtotal,0,',','.') . '</td>';
            echo '<td>';
            echo '<form style="display:inline" action="/eventosyekari/eventosyekari/proyecto0/controlador/CartController.php" method="post">';
            echo "<input type='hidden' name='action' value='remove'>";
            echo "<input type='hidden' name='CodigoServicio' value='".htmlspecialchars($code,ENT_QUOTES)."'>";
            echo '<button class="btn" type="submit">Eliminar</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        echo '<h3>Total: $' . number_format($total,0,',','.') . '</h3>';
        echo '<div style="display:flex;gap:12px">';
        echo '<form action="/eventosyekari/eventosyekari/proyecto0/controlador/CartController.php" method="post">';
        echo "<input type='hidden' name='action' value='clear'>";
        echo '<button class="btn" type="submit">Vaciar carrito</button>';
        echo '</form>';
        echo '<a class="btn btn-primary" href="/eventosyekari/eventosyekari/proyecto0/vista/Checkout.php">Ir a pagar</a>';
        echo '</div>';
    }
    ?>

</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
