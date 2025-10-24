<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once(__DIR__ . '/../controlador/db.php');

try{
    $stmt = $conn->query("SELECT id, codigo, titulo, imagen, duracion, precio, descripcion FROM servicios ORDER BY creado_en DESC");
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e){
    $servicios = [];
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
  <title>Catálogo de servicios - Eventos Yekari</title>
</head>
<body>

<?php include_once(__DIR__ . '/header.php'); ?>

<main class="section">
  <div class="container">
    <h1 class="section-title">Catálogo de servicios</h1>

    <?php if(isset($_GET['m'])): ?>
        <p><strong><?php echo htmlspecialchars($_GET['m']); ?></strong></p>
    <?php endif; ?>

    <div class="catalogo" role="list">
        <?php if(count($servicios) == 0): ?>
            <p>No hay servicios para mostrar.</p>
        <?php else: ?>
            <?php $i = 0; foreach($servicios as $s): $i++;
                $colorClass = 'card-color-' . ( ($i % 4) == 0 ? 4 : ($i % 3 == 0 ? 3 : ($i % 3 == 2 ? 2 : 1)) );
                // Preparar src de la imagen: si es ruta absoluta o URL la usamos, si no asumimos nombre de archivo en public/img
                $imgSrc = '';
                if (!empty($s['imagen'])){
                    if (strpos($s['imagen'],'http') === 0 || strpos($s['imagen'], '/') === 0){
                        $imgSrc = $s['imagen'];
                    } else {
                        $imgSrc = '/eventosyekari/eventosyekari/proyecto0/public/img/' . $s['imagen'];
                    }
                } else {
                    // Placeholder SVG data URI
                    $imgSrc = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='600' height='400'><rect width='100%' height='100%' fill='%23cccccc'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%23666' font-size='20'>Sin imagen</text></svg>";
                }
            ?>
                <div class="service-card-expandable <?php echo $colorClass; ?>" role="listitem" aria-expanded="false">
                    <div class="service-header">
                        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($s['titulo']); ?>" class="service-image">
                        <h3><?php echo htmlspecialchars($s['titulo']); ?></h3>
                        <p class="service-duration"><?php echo htmlspecialchars($s['duracion']); ?></p>
                        <p class="service-price">S/ <?php echo number_format($s['precio'],2); ?></p>
                        <button class="toggle-details" aria-label="Ver más detalles" aria-expanded="false"><span class="toggle-icon">+</span></button>
                    </div>

                    <div class="service-details" aria-hidden="true">
                        <h4 class="details-title">Información</h4>
                        <p class="details-text"><?php echo nl2br(htmlspecialchars($s['descripcion'])); ?></p>
                        <form method="post" action="../controlador/CarritoControlador.php?accion=agregar">
                            <input type="hidden" name="id" value="<?php echo intval($s['id']); ?>">
                            <!-- Cantidad por defecto 1 (campo oculto para que no se muestre al usuario) -->
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn-agregar">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
  </div>
</main>

<?php include_once(__DIR__ . '/footer.php'); ?>
</body>
<script src="/eventosyekari/eventosyekari/proyecto0/public/js/catalogo.js"></script>
</html>
