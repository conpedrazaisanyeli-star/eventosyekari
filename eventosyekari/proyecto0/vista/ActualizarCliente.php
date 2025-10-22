<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Estilos.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("../vista/menu.php");
    require_once("../controlador/ConsultarCliente.php");
    ?>
    <br>
    <h1>ACTUALIZAR CLIENTE</h1>
    <form action="../controlador/ClienteControlador.php" method="post">
       
    <input type='hidden'  name='Identificacion'  value='<?php echo $Cliente['Identificacion']?>'>
    <input type='hidden' name='Accion' value='Actualizar'>

       <label for ="Identificacion">Identificacion:</label>
       <input type="text" id="Identificacion1" name="Identificacion1" require value="<?php echo $Cliente["Identificacion"] ?>"><br>

       <label for ="Nombre">Nombre:</label>
       <input type="text" id="Nombre" name="Nombre" require value="<?php echo $Cliente["Nombre"] ?>"><br> 

       <label for="Apellido">Apellido</label>
       <input type="text" id="Apellido" name="Apellido"require value="<?php echo $Cliente["Apellido"] ?>"><br>

       <label for ="Direccion">Direccion:</label>
       <input type="text" id="Direccion" name="Direccion" requirevalue="<?php echo $Cliente["Direccion"] ?>"><br>

       <label for ="Celular">Celular:</label>
       <input type="text" id="Celular" name="Celular"require value="<?php echo $Cliente["Celular"] ?>"><br>

       <label for ="FechaNacimiento">FechaNacimiento:</label>
       <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $Cliente["FechaNacimiento"] ?>"><br>

       <label for ="CorreoElectronico">CorreoElectronico:</label>
       <input type="email" id="CorreoElectronico" name="CorreoElectronico"require value="<?php echo $Cliente["CorreoElectronico"] ?>"><br>

       <label for ="Clave">Clave:</label>
       <input type="text" id="Clave" name="Clave"require value="<?php echo $Cliente["Clave"] ?>"><br>

       <input type="submit" value="Registrar">
       
</form>
</body>
</html>