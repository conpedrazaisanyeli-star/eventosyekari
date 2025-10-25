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

                        <form method="post" action="../controlador/CarritoControlador.php?accion=pagar" novalidate>
                                <label>Identificación del cliente: <input type="text" name="cliente_identificacion" required placeholder="Cédula o RUC"></label>
                                <label style="display:block;margin-top:.5rem">Dirección de entrega / evento: <input type="text" name="direccion" required placeholder="Calle, número, barrio"></label>
                                <label style="display:block;margin-top:.5rem">Teléfono de contacto: <input type="tel" name="telefono" required placeholder="+57 3XX XXX XXXX" pattern="[0-9+\s-]{7,20}"></label>
                                <div style="display:flex;gap:0.5rem;align-items:center;margin-top:.5rem;flex-wrap:wrap">
                                    <label>Fecha del servicio: <input type="date" name="fecha" required min="<?php echo date('Y-m-d'); ?>"></label>
                                    <label>Hora aproximada: <input type="time" name="hora" required></label>
                                </div>
                                <div style="margin-top:.6rem">
                                    <button type="submit" class="btn-primary">Simular pago</button>
                                </div>
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
