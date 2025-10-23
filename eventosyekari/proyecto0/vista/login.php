<?php
session_start();
//si ya esta la sesion creada lo que reenvia al index
if(isset($_SESSION["Identificacion"])){
    header ("location:/eventosyekari/eventosyekari/proyecto0/vista/menu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <!-- Estilos específicos del header -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/header.css">
    <!-- Estilos específicos del footer -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
    <!-- Estilos específicos del login -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/login.css">
    <title>iniciar sesion</title>
</head>
<body>
    <?php include("header.php");
    ?>
    <div class="login-wrapper">
        <div class="login-card" role="region" aria-labelledby="login-title">
            <h1 id="login-title">Iniciar sesión</h1>
            <?php if(isset($_GET["m"])): ?>
                <p class="login-message"><?php echo htmlspecialchars($_GET["m"], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>

            <form class="login-form" action="/eventosyekari/eventosyekari/proyecto0/controlador/Procesarlogin.php" method="post" autocomplete="on">
                <div class="form-row">
                    <label for="Identificacion">Identificación</label>
                    <input type="text" name="Identificacion" id="Identificacion" required inputmode="numeric" />
                </div>

                <div class="form-row">
                    <label for="Clave">Clave</label>
                    <input type="hidden" name="Accion" value="Iniciar">
                    <input type="password" name="Clave" id="Clave" required autocomplete="current-password" />
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                </div>

                <small class="helper">¿No tienes cuenta? Contáctanos para crear una.</small>
            </form>
        </div>
    </div>
    <?php include("footer.php");
    ?>
</body>
</html>