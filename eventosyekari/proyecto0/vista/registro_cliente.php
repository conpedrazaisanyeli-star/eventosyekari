<?php
session_start();
// Si ya está logueado como cliente redirigir al home
if(isset($_SESSION['ClienteIdentificacion'])){
    header('Location: /eventosyekari/eventosyekari/proyecto0/vista/Home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registro de Cliente</title>
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/header.css">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/login.css">
  <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
</head>
<body>
<?php include('header.php'); ?>
<div class="login-wrapper">
  <div class="login-card" role="region" aria-labelledby="registro-title">
    <h1 id="registro-title">Registro de cliente</h1>
    <?php if(isset($_GET['m'])): ?><p class="login-message"><?php echo htmlspecialchars($_GET['m']); ?></p><?php endif; ?>

    <form class="login-form" method="post" action="/eventosyekari/eventosyekari/proyecto0/controlador/ClienteControlador.php" autocomplete="on">
      <input type="hidden" name="redirect" value="/eventosyekari/eventosyekari/proyecto0/vista/login.php">

      <div class="form-row">
        <label for="Identificacion">Identificación</label>
        <input type="text" id="Identificacion" name="Identificacion" required inputmode="numeric" placeholder="Número de identificación">
      </div>

      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:0.6rem;">
        <div>
          <label for="Nombre">Nombre</label>
          <input type="text" id="Nombre" name="Nombre" required placeholder="Tu nombre">
        </div>
        <div>
          <label for="Apellido">Apellido</label>
          <input type="text" id="Apellido" name="Apellido" required placeholder="Tu apellido">
        </div>
      </div>

      <div class="form-row">
        <label for="CorreoElectronico">Correo electrónico</label>
        <input type="email" id="CorreoElectronico" name="CorreoElectronico" placeholder="ejemplo@correo.com">
      </div>

      <div class="form-row">
        <label for="Telefono">Celular</label>
        <input type="tel" id="Telefono" name="Celular" pattern="[0-9+()\-\s]{6,20}" placeholder="Opcional: +57 300 0000000">
      </div>

      <div class="form-row" style="display:grid;grid-template-columns:1fr 1fr;gap:0.6rem;">
        <div>
          <label for="FechaNacimiento">Fecha de nacimiento</label>
          <input type="date" id="FechaNacimiento" name="FechaNacimiento">
        </div>
        <div>
          <label for="Direccion">Dirección</label>
          <input type="text" id="Direccion" name="Direccion" placeholder="Ciudad, barrio...">
        </div>
      </div>

      <div class="form-row">
        <label for="Clave">Clave</label>
        <input type="password" id="Clave" name="Clave" required minlength="6" placeholder="Mínimo 6 caracteres">
      </div>

      <div class="form-row">
        <button class="btn btn-primary" type="submit">Crear cuenta</button>
      </div>

      <small class="helper">Al registrarte aceptas nuestros términos. ¿Ya tienes cuenta? <a href="/eventosyekari/eventosyekari/proyecto0/vista/login.php">Inicia sesión</a></small>
    </form>
  </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>