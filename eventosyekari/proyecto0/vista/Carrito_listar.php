<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total = 0;
foreach($carrito as $it) $total += $it['precio'] * $it['cantidad'];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
  <title>Carrito - Eventos Yekari</title>
</head>
<body>

<?php include_once(__DIR__ . '/header.php'); ?>

<main class="section">
  <div class="container cart-wrapper">
    <h1 class="section-title">Tu carrito</h1>

    <?php if(isset($_GET['m'])): ?>
        <p><strong><?php echo htmlspecialchars($_GET['m']); ?></strong></p>
    <?php endif; ?>

    <?php if(count($carrito) == 0): ?>
        <div class="more-services" style="text-align:center;margin-top:20px;">
            <div class="footer-section">
                <p>El carrito está vacío. </p>
            </div>
                
                 <a href="/eventosyekari/eventosyekari/proyecto0/vista/catalogo.php" class="cta">Ver servicios</a>
            </div>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($carrito as $it): ?>
                    <tr>
                        <td class="cart-item-title"><?php echo htmlspecialchars($it['titulo']); ?><div class="cart-item-sub">ID: <?php echo intval($it['id']); ?></div></td>
                        <td>S/ <?php echo number_format($it['precio'],2); ?></td>
                        <td><?php echo intval($it['cantidad']); ?></td>
                        <td>S/ <?php echo number_format($it['precio'] * $it['cantidad'],2); ?></td>
                        <td class="cart-actions">
                            <a class="btn-danger" href="../controlador/CarritoControlador.php?accion=eliminar&id=<?php echo intval($it['id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <div></div>
            <div>
                <div class="cart-total">Total: S/ <?php echo number_format($total,2); ?></div>
            </div>
        </div>

        <form method="post" action="../controlador/CarritoControlador.php?accion=pagar">
            <label>Identificación del cliente (opcional): <input type="text" name="cliente_identificacion"></label>
            <button type="submit" class="btn-primary">Simular pago</button>
        </form>

        <p style="margin-top:1rem">
            <a class="btn-danger" href="../controlador/CarritoControlador.php?accion=vaciar">Vaciar carrito</a>
        </p>
    <?php endif; ?>
  </div>
</main>

<?php include_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
