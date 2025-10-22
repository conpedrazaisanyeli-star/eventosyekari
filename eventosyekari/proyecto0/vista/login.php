<?php
session_start();
//si ya esta la sesion creada lo que reenvia al index
if(isset($_SESSION["Identificacion"])){
    header ("location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Estilos.css">
    <title>iniciar sesion</title>
</head>
<body>
    <?php
    include_once("menu.php");
    ?>
    <br>
        <h1>Iniciar sesion</h1>
    <?php
          if(isset($_GET["m"])) {echo "<h2>".$_GET["m"]."</h2>";}
    ?>
        <form action="../controlador/Procesarlogin.php" method="post">
        <label for="Identificacion">Identificacion: </label>
        <input type="text" name= "Identificacion" id="Identificacion">
        <label for="Clave">Clave: </label>
        <input type="hidden" name="Accion" value="Iniciar">
        <input type="password" name= "Clave" id="Clave">
        <button type="submit">Iniciar sesion</button>
    </form>
</body>
</html>