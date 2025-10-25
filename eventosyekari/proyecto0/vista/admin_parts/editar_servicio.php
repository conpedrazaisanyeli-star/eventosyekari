<?php
require_once(__DIR__ . '/../../controlador/db.php');
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$serv = null;
if($id>0){
    $stmt = $conn->prepare("SELECT * FROM servicios WHERE id = ?");
    $stmt->execute([$id]);
    $serv = $stmt->fetch(PDO::FETCH_ASSOC);
}
if(!$serv){
    echo "<p>Servicio no encontrado.</p>";
    return;
}
?>
<h2>Editar servicio #<?php echo intval($serv['id']); ?></h2>
<form method="post" action="../controlador/ServiciosControlador.php?accion=actualizar" enctype="multipart/form-data">
  <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=services">
  <input type="hidden" name="id" value="<?php echo intval($serv['id']); ?>">
  <label>Código: <input type="text" name="codigo" required value="<?php echo htmlspecialchars($serv['codigo']); ?>"></label>
  <label>Título: <input type="text" name="titulo" required value="<?php echo htmlspecialchars($serv['titulo']); ?>"></label>
  <label>Duración: <input type="text" name="duracion" required value="<?php echo htmlspecialchars($serv['duracion']); ?>"></label>
  <label>Precio: <input type="number" name="precio" required step="0.01" min="0" value="<?php echo htmlspecialchars($serv['precio']); ?>"></label>
  <label>Descripción: <textarea name="descripcion" required rows="4"><?php echo htmlspecialchars($serv['descripcion']); ?></textarea></label>
  <div style="display:flex;gap:1rem;align-items:center">
    <div>
      <div>Imagen actual:</div>
      <?php if(!empty($serv['imagen'])): ?>
        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/<?php echo htmlspecialchars($serv['imagen']); ?>" alt="" style="width:140px;height:80px;object-fit:cover;border-radius:6px;border:2px solid rgba(0,0,0,0.06)">
      <?php else: ?>
        <div style="width:140px;height:80px;background:#eee;display:flex;align-items:center;justify-content:center;border-radius:6px">Sin imagen</div>
      <?php endif; ?>
    </div>
      <div class="file-input-wrapper" style="flex:1">
        <label class="file-input-button">Cambiar imagen
          <input type="file" name="imagen" accept="image/*">
        </label>
        <span class="file-input-filename"><?php echo htmlspecialchars($serv['imagen'] ?: 'Ningún archivo seleccionado'); ?></span>
      </div>
  </div>
  <div style="margin-top:0.8rem"><button class="admin-btn admin-btn-primary" type="submit">Actualizar servicio</button></div>
    <script>
      (function(){
        // The script is inside the form, so parentElement is the form
        const form = document.currentScript.parentElement;
        const fileInput = form.querySelector('input[type=file]');
        const nameSpan = form.querySelector('.file-input-filename');
        if(fileInput){
          fileInput.addEventListener('change', function(e){
            const f = this.files && this.files[0];
            nameSpan.textContent = f ? f.name : '<?php echo addslashes(htmlspecialchars($serv['imagen'] ?: 'Ningún archivo seleccionado')); ?>';
          });
        }
      })();
    </script>
</form>
