<?php
require_once(__DIR__ . '/../../controlador/db.php');
try{
    $stmt = $conn->query("SELECT * FROM servicios ORDER BY creado_en DESC");
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){ $servicios = []; }
?>
<div class="admin-message" style="display:flex;justify-content:space-between;align-items:center">
  <h2>Servicios / Productos</h2>
  <a href="?page=new_service" class="admin-btn admin-btn-accent">Nuevo servicio</a>
</div>

<?php if(count($servicios) == 0): ?>
  <p>No hay servicios registrados.</p>
<?php else: ?>
  <table>
    <thead>
      <tr><th>ID</th><th>Imagen</th><th>Código</th><th>Título</th><th>Precio</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <?php foreach($servicios as $s): ?>
        <tr>
          <td><?php echo intval($s['id']); ?></td>
          <td style="width:120px"><img src="/eventosyekari/eventosyekari/proyecto0/public/img/<?php echo htmlspecialchars($s['imagen']); ?>" alt="" style="width:100px;height:60px;object-fit:cover;border-radius:6px;border:2px solid rgba(0,0,0,0.06)"></td>
          <td><?php echo htmlspecialchars($s['codigo']); ?></td>
          <td><?php echo htmlspecialchars($s['titulo']); ?></td>
          <td>S/ <?php echo number_format($s['precio'],2); ?></td>
          <td class="admin-actions">
            <a class="admin-btn admin-btn-primary" href="?page=edit_service&id=<?php echo intval($s['id']); ?>">Editar</a>
            <a class="admin-btn admin-btn-danger" href="../controlador/ServiciosControlador.php?accion=eliminar&id=<?php echo intval($s['id']); ?>&redirect=../vista/dashboard_admin.php?page=services" onclick="return confirm('Eliminar este servicio?');">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
