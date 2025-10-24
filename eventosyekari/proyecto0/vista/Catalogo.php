<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once __DIR__ . '/../controlador/AgendaservicioControlador.php';
require_once __DIR__ . '/../controlador/AdministradorControlador.php';

$ctl = new AgendaservicioControlador();
$adminCtl = new AdministradorControlador();
$items = $ctl->listarAgendaservicio();

// Pequeña función de escape
function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de servicios</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>

<main class="container">
    <h1>Catálogo de servicios</h1>
    <p>Listado de horarios/servicios disponibles. Añade al carrito el que prefieras.</p>

    <section class="catalog-grid">
        <?php if (empty($items)): ?>
            <p>No hay servicios disponibles en este momento.</p>
        <?php else: ?>
            <?php foreach ($items as $it): 
                // Campos desde agendaservicio: CodigoServicio, Identificacion, Hora, Dia
                $code = $it['CodigoServicio'] ?? 'svc';
                $ident = $it['Identificacion'] ?? '';
                $hora = $it['Hora'] ?? '';
                $dia = $it['Dia'] ?? '';

                // Intentar obtener nombre del administrador/proveedor
                $provider = $adminCtl->Consultaradministrador($ident);
                $providerName = is_array($provider) && count($provider)>0 ? ($provider[0]['Nombre'] ?? 'Proveedor') : 'Proveedor';

                // Precio por defecto (si la base no tiene precios). Ajusta según tu esquema de datos.
                $price = 50.00;
            ?>
            <article class="service-card">
                <header>
                    <h3><?= e($providerName) ?> — Servicio #<?= e($code) ?></h3>
                    <div class="meta">Dia: <?= e($dia) ?> | Hora: <?= e($hora) ?></div>
                </header>
                <div class="body">
                    <p>Descripción breve del servicio proporcionado por <?= e($providerName) ?>.</p>
                </div>
                <footer>
                    <div class="price">Precio: $<?= number_format($price,2,',','.') ?></div>
                    <form method="post" action="/eventosyekari/eventosyekari/proyecto0/controlador/CartController.php">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="CodigoServicio" value="<?= e($code) ?>">
                        <input type="hidden" name="Nombre" value="<?= e($providerName . ' - Servicio ' . $code) ?>">
                        <input type="hidden" name="Precio" value="<?= e($price) ?>">
                        <label>
                            Cantidad
                            <input type="number" name="Cantidad" value="1" min="1" style="width:4rem">
                        </label>
                        <button type="submit" class="btn-primary">Agregar al carrito</button>
                    </form>
                </footer>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

</main>

<?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
