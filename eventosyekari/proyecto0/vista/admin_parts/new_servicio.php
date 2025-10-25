<?php
// Formulario para crear servicio
?>
<h2>Crear nuevo servicio</h2>
<form method="post" action="../controlador/ServiciosControlador.php?accion=crear" enctype="multipart/form-data">
  <input type="hidden" name="redirect" value="../vista/dashboard_admin.php?page=services">
  <label>Código: <input type="text" name="codigo" required></label>
  <label>Título: <input type="text" name="titulo" required></label>
  <label>Duración: <input type="text" name="duracion" required placeholder="Ej: 3 HORAS"></label>
  <label>Precio: <input type="number" name="precio" required step="0.01" min="0"></label>
  <label>Descripción: <textarea name="descripcion" required rows="4"></textarea></label>
  <div class="file-input-wrapper">
    <label class="file-input-button">Seleccionar imagen
      <input type="file" name="imagen" accept="image/*" required>
    </label>
    <span class="file-input-filename">Ningún archivo seleccionado</span>
  </div>
  <div style="margin-top:0.8rem"><button class="admin-btn admin-btn-accent" type="submit">Crear servicio</button></div>
</form>

<script>
  (function(){
    const wrapper = document.currentScript.previousElementSibling; // the form
    const fileInput = wrapper.querySelector('input[type=file]');
    const nameSpan = wrapper.querySelector('.file-input-filename');
    if(fileInput){
      fileInput.addEventListener('change', function(e){
        const f = this.files && this.files[0];
        nameSpan.textContent = f ? f.name : 'Ningún archivo seleccionado';
      });
    }
  })();
</script>
 
