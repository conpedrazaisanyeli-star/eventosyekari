<?php
// Mostrar órdenes y sus items sin CSS (vista simple para admin)
session_start();
if(!isset($_SESSION['Identificacion'])){
    header('Location: /eventosyekari/eventosyekari/proyecto0/vista/login.php?m=Debe iniciar sesión');
    exit;
}
require_once(__DIR__ . '/../controlador/db.php');

try{
    $stmt = $conn->query("SELECT * FROM ordenes ORDER BY creado_en DESC");
    $ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
    $ordenes = [];
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Órdenes - Eventos Yekari</title>
</head>
<body>
<?php // menu removed per admin request ?>
<h1>Listado de órdenes</h1>
<?php if(count($ordenes) == 0): ?>
    <p>No hay órdenes registradas.</p>
<?php else: ?>
    <?php foreach($ordenes as $o): ?>
        <section style="border:1px solid #ccc;padding:10px;margin:10px 0;">
            <h2>Orden #<?php echo intval($o['id']); ?></h2>
            <p>Cliente: <?php echo htmlspecialchars($o['cliente_identificacion']); ?></p>
            <p>Total: S/ <?php echo number_format($o['total'],2); ?></p>
            <p>Creado: <?php echo htmlspecialchars($o['creado_en']); ?></p>
            <h3>Items</h3>
            <?php
                $stmt = $conn->prepare("SELECT oi.*, s.titulo FROM orden_items oi LEFT JOIN servicios s ON oi.servicio_id = s.id WHERE oi.orden_id = ?");
                $stmt->execute([$o['id']]);
                $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php if(count($items) == 0): ?>
                <p>No hay items.</p>
            <?php else: ?>
                <ul>
                <?php foreach($items as $it): ?>
                    <li><?php echo htmlspecialchars($it['titulo'] ?: ('Servicio ID '.intval($it['servicio_id'])));
                        echo ' — Cantidad: '.intval($it['cantidad']).' — Precio unitario: S/ '.number_format($it['precio_unitario'],2);
                    ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
