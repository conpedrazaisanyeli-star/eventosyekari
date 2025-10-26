<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Helper functions
function h($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
function fmt($n) { return number_format((float)$n, 2); }

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total = 0;
foreach ($carrito as $it) {
    $total += ($it['precio'] ?? 0) * ($it['cantidad'] ?? 0);
}

$minDate = date('Y-m-d');
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

    <?php if (isset($_GET['m'])): ?>
      <p><strong><?php echo h($_GET['m']); ?></strong></p>
    <?php endif; ?>

    <?php if (count($carrito) === 0): ?>
      <div class="more-services" style="text-align:center; margin-top:20px;">
        <div class="footer-section">
          <p>El carrito está vacío.</p>
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
          <?php foreach ($carrito as $it): ?>
            <tr>
              <td class="cart-item-title">
                <?php echo h($it['titulo'] ?? ''); ?>
                <div class="cart-item-sub">ID: <?php echo intval($it['id'] ?? 0); ?></div>
              </td>
              <td>S/ <?php echo fmt($it['precio'] ?? 0); ?></td>
              <td><?php echo intval($it['cantidad'] ?? 0); ?></td>
              <td>S/ <?php echo fmt(($it['precio'] ?? 0) * ($it['cantidad'] ?? 0)); ?></td>
              <td class="cart-actions">
                <a class="btn-danger" href="../controlador/CarritoControlador.php?accion=eliminar&id=<?php echo intval($it['id'] ?? 0); ?>">
                  Eliminar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="cart-summary">
        <div></div>
        <div>
          <div class="cart-total">Total: S/ <?php echo fmt($total); ?></div>
        </div>
      </div>

      <?php if (!empty($_SESSION['ClienteIdentificacion'])): ?>
        <form method="post" action="../controlador/CarritoControlador.php?accion=pagar" novalidate>
          <input type="hidden" name="cliente_identificacion" value="<?php echo h($_SESSION['ClienteIdentificacion']); ?>">
          <label style="display:block; margin-top:.5rem">
            Dirección de entrega / evento:
            <input type="text" name="direccion" required placeholder="Calle, número, barrio">
          </label>
          <label style="display:block; margin-top:.5rem">
            Teléfono de contacto:
            <input type="tel" name="telefono" required placeholder="+57 3XX XXX XXXX" pattern="[0-9+\s-]{7,20}">
          </label>
          <div style="display:flex; gap:0.5rem; align-items:center; margin-top:.5rem; flex-wrap:wrap;">
            <label>Fecha del servicio:
              <input type="date" name="fecha" required min="<?php echo $minDate; ?>">
            </label>
            <label>Hora aproximada:
              <input type="time" name="hora" required>
            </label>
          </div>
          <div style="margin-top:.6rem">
            <button type="submit" class="btn-primary">Simular pago</button>
          </div>
        </form>
      <?php else: ?>
        <div class="auth-prompt" aria-live="polite">
          <div class="auth-icon" aria-hidden="true">
            <!-- simple user SVG -->
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z" fill="#fff" />
              <path d="M3 21c0-3.866 3.582-7 9-7s9 3.134 9 7v1H3v-1z" fill="#fff" opacity="0.9" />
            </svg>
          </div>
          <div class="auth-text">
            <h3>Para continuar</h3>
            <p>Debes iniciar sesión o crear una cuenta para completar la compra, guardar tus datos y ver tus órdenes.</p>
            <div class="auth-actions">
              <a href="/eventosyekari/eventosyekari/proyecto0/vista/login.php" class="auth-link">Iniciar sesión</a>
              <a href="/eventosyekari/eventosyekari/proyecto0/vista/registro_cliente.php" class="auth-link auth-register">Registrarse</a>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <p style="margin-top:1rem">
        <a class="btn-danger" href="../controlador/CarritoControlador.php?accion=vaciar">Vaciar carrito</a>
      </p>
    <?php endif; ?>
  </div>
</main>

<?php include_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
