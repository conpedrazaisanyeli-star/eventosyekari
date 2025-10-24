document.addEventListener('DOMContentLoaded', function(){
  // Delegación de eventos para botones toggle
  document.querySelectorAll('.toggle-details').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      var card = btn.closest('.service-card-expandable');
      if(!card) return;
      var details = card.querySelector('.service-details');
      var expanded = card.getAttribute('aria-expanded') === 'true';
      // Toggle clases
      if(details){
        details.classList.toggle('active');
        var isActive = details.classList.contains('active');
        details.setAttribute('aria-hidden', isActive ? 'false' : 'true');
        btn.setAttribute('aria-expanded', isActive ? 'true' : 'false');
        card.setAttribute('aria-expanded', isActive ? 'true' : 'false');
        // cambiar icono
        var icon = btn.querySelector('.toggle-icon');
        if(icon) icon.textContent = isActive ? '−' : '+';
      }
    });
  });

  // Permitir hacer click en la imagen para alternar detalles
  document.querySelectorAll('.service-image').forEach(function(img){
    img.addEventListener('click', function(){
      var card = img.closest('.service-card-expandable');
      if(!card) return;
      var btn = card.querySelector('.toggle-details');
      if(btn) btn.click();
    });
  });

  // Mejora: si se presiona agregar en una tarjeta que no está expandida,
  // la abrimos antes de enviar para que el usuario vea la confirmación.
  document.querySelectorAll('.btn-agregar').forEach(function(b){
    b.addEventListener('click', function(e){
      var card = b.closest('.service-card-expandable');
      if(card){
        var details = card.querySelector('.service-details');
        if(details && !details.classList.contains('active')){
          // Evitar que el formulario se envíe instantáneamente; abrimos y enfocamos cantidad
          e.preventDefault();
          var toggle = card.querySelector('.toggle-details');
          if(toggle) toggle.click();
          // después de 300ms enviamos el formulario si el botón era dentro de un formulario
          setTimeout(function(){
            var form = b.closest('form');
            if(form){ form.submit(); }
          }, 350);
        }
      }
    });
  });

});
