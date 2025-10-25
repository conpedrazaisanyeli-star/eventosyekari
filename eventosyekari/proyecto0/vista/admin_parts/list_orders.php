<?php
// Fragmento: lista de ordenes con tarjetas animadas
require_once(__DIR__ . '/../../controlador/db.php');
try{
    $stmt = $conn->query("SELECT * FROM ordenes ORDER BY creado_en DESC");
    $ordenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){ $ordenes = []; }
?>
<h2>Listado de Órdenes</h2>
<?php if(count($ordenes) == 0): ?>
    <p>No hay órdenes registradas.</p>
<?php else: ?>
    <?php foreach($ordenes as $o): ?>
        <article class="order-card" role="article" aria-labelledby="orden-<?php echo intval($o['id']); ?>">
            <header>
                <h3 id="orden-<?php echo intval($o['id']); ?>">Orden #<?php echo intval($o['id']); ?></h3>
                <div style="font-weight:700;color:var(--color-blue);">Total: S/ <?php echo number_format($o['total'],2); ?></div>
                <div style="font-size:0.9rem;color:rgba(255,255,255,0.75);">Creado: <?php echo htmlspecialchars($o['creado_en']); ?></div>
                <?php if(!empty($o['direccion'])): ?><div style="margin-top:0.35rem;color:rgba(255,255,255,0.85)"><strong>Dirección:</strong> <?php echo htmlspecialchars($o['direccion']); ?></div><?php endif; ?>
                <?php if(!empty($o['telefono'])): ?><div style="color:rgba(255,255,255,0.85)"><strong>Teléfono:</strong> <?php echo htmlspecialchars($o['telefono']); ?></div><?php endif; ?>
                <?php if(!empty($o['fecha_evento']) || !empty($o['hora_evento'])): ?><div style="color:rgba(255,255,255,0.82)"><strong>Fecha / Hora:</strong> <?php echo htmlspecialchars(($o['fecha_evento'] ?? '-') . ' ' . ($o['hora_evento'] ?? '')); ?></div><?php endif; ?>
            </header>
            <section style="margin-top:0.6rem;">
                <p><strong>Cliente:</strong> <?php echo htmlspecialchars($o['cliente_identificacion']); ?></p>
                <h4 style="margin-top:0.5rem;">Items</h4>
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
        </article>
    <?php endforeach; ?>
<?php endif; ?>
