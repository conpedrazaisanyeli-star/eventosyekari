<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'cliente'){
    header('Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=' . urlencode('Inicia sesión como cliente'));
    exit();
}
require_once(__DIR__ . '/../controlador/db.php');
require_once(__DIR__ . '/../controlador/ClienteControlador.php');
$ident = $_SESSION['ClienteIdentificacion'];
$cliente = null;
$ctrl = new ClienteControlador();
$rows = $ctrl->ConsultarCliente($ident);
if(!empty($rows)) $cliente = $rows[0];

// Obtener órdenes del cliente
$stmt = $conn->prepare("SELECT * FROM ordenes WHERE cliente_identificacion = ? ORDER BY id DESC");
$stmt->execute([$ident]);
$ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/header.css">
  <title>Mi cuenta - Eventos Yekari</title>
</head>
<body>
<?php include_once(__DIR__ . '/header.php'); ?>
<main class="section">
  <div class="container">
    <h1 class="section-title">Mi cuenta</h1>

    <div class="admin-panel-large" style="margin-top:1rem">
      <div style="display:grid;grid-template-columns:320px 1fr;gap:1rem;align-items:start">
        <aside class="login-card" style="padding:1rem">
          <div style="display:flex;gap:1rem;align-items:center">
            <div class="admin-avatar" style="width:84px;height:84px;font-size:1.6rem;"><?php echo isset($cliente['Nombre'])? strtoupper(substr($cliente['Nombre'],0,1)) : 'C'; ?><?php echo isset($cliente['Apellido'])? strtoupper(substr($cliente['Apellido'],0,1)) : ''; ?></div>
            <div>
              <h2 style="margin:0;font-size:1.25rem"><?php echo htmlspecialchars($cliente['Nombre'] . ' ' . $cliente['Apellido']); ?></h2>
              <div style="color:rgba(0,0,0,0.6)">ID: <?php echo htmlspecialchars($cliente['Identificacion']); ?></div>
            </div>
          </div>

          <hr style="margin:1rem 0; border-color: rgba(0,0,0,0.06)">

          <h3 style="margin:0 0 .6rem 0">Editar perfil</h3>
          <?php if($cliente): ?>
            <form method="post" action="/eventosyekari/eventosyekari/proyecto0/controlador/ClienteControlador.php" style="display:grid;gap:0.6rem">
              <!-- Enviar tanto Identificacion (nuevo valor) como Identificacion1 (valor original) -->
              <input type="hidden" name="Identificacion" value="<?php echo htmlspecialchars($cliente['Identificacion']); ?>">
              <input type="hidden" name="Identificacion1" value="<?php echo htmlspecialchars($cliente['Identificacion']); ?>">
              <!-- Redirect de regreso al panel de cliente -->
              <input type="hidden" name="redirect" value="/eventosyekari/eventosyekari/proyecto0/vista/cliente_panel.php">
              <label>Nombre <input type="text" name="Nombre" value="<?php echo htmlspecialchars($cliente['Nombre']); ?>" required></label>
              <label>Apellido <input type="text" name="Apellido" value="<?php echo htmlspecialchars($cliente['Apellido']); ?>" required></label>
              <label>Correo <input type="email" name="CorreoElectronico" value="<?php echo htmlspecialchars($cliente['CorreoElectronico']); ?>"></label>
              <label>Teléfono <input type="text" name="Celular" value="<?php echo htmlspecialchars($cliente['Celular']); ?>"></label>
              <label>Dirección <input type="text" name="Direccion" value="<?php echo htmlspecialchars($cliente['Direccion']); ?>"></label>
              <label>Clave (dejar en blanco para no cambiar) <input type="password" name="Clave" placeholder="Nueva clave"></label>
              <input type="hidden" name="Accion" value="Actualizar">
              <div><button class="admin-btn admin-btn-primary" type="submit">Guardar cambios</button></div>
            </form>
          <?php else: ?>
            <p>No se encontró tu información. Por favor contacta a soporte.</p>
          <?php endif; ?>
        </aside>

        <section>
          <h3>Pedidos recientes</h3>
          <?php if(empty($ordenes)): ?>
            <div class="login-card">
              <p>No has realizado compras todavía.</p>
              <a href="/eventosyekari/eventosyekari/proyecto0/vista/catalogo.php" class="cta">Ver servicios</a>
            </div>
          <?php else: ?>
            <div style="display:grid;gap:1rem">
            <?php foreach($ordenes as $ord): ?>
              <div class="order-card">
                <div style="display:flex;justify-content:space-between;align-items:center">
                  <div>
                    <strong>Orden #<?php echo intval($ord['id']); ?></strong>
                    <div style="color:rgba(0,0,0,0.6)">Fecha: <?php echo htmlspecialchars($ord['fecha_evento']); ?> <?php echo htmlspecialchars($ord['hora_evento']); ?></div>
                  </div>
                  <div><strong>Total: S/ <?php echo number_format($ord['total'],2); ?></strong></div>
                </div>
                <div style="margin-top:.6rem">
                  <?php
                    $stmt2 = $conn->prepare("SELECT oi.*, s.titulo FROM orden_items oi LEFT JOIN servicios s ON s.id = oi.servicio_id WHERE oi.orden_id = ?");
                    $stmt2->execute([$ord['id']]);
                    $items = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                  ?>
                  <ul>
                    <?php foreach($items as $it): ?>
                      <li><?php echo htmlspecialchars($it['titulo']); ?> — Cant: <?php echo intval($it['cantidad']); ?> — S/ <?php echo number_format($it['precio_unitario'],2); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </section>
      </div>
    </div>
  </div>
</main>
<?php include_once(__DIR__ . '/footer.php'); ?>
</body>
</html>