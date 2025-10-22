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
    require_once("../controlador/ConsultarAdministrador.php");
    ?>
    <br>
    <h1>ACTUALIZAR ADMINISTRADOR</h1>
    <form action="../controlador/AdministradorControlador.php" method="post">
       
    <input type='hidden'  name='Identificacion'  value='<?php echo $Administrador['Identificacion']?>'>
    <input type='hidden' name='Accion' value='Actualizar'>

       <label for ="Identificacion">Identificacion:</label>
       <input type="text" id="Identificacion1" name="Identificacion1" require value="<?php echo $Administrador["Identificacion"] ?>"><br>

       <label for ="Nombre">Nombre:</label>
       <input type="text" id="Nombre" name="Nombre" require value="<?php echo $Administrador["Nombre"] ?>"><br> 

       <label for="Apellido">Apellido</label>
       <input type="text" id="Apellido" name="Apellido"require value="<?php echo $Administrador["Apellido"] ?>"><br>

       <label for ="CargaEmpresarial">CargaEmpresarial:</label>
       <input type="text" id="CargaEmpresarial" name="CargaEmpresarial"require value="<?php echo $Administrador["CargaEmpresarial"] ?>"><br>

       <label for ="Direccion">Direccion:</label>
       <input type="text" id="Direccion" name="Direccion" requirevalue="<?php echo $Administrador["Direccion"] ?>"><br>

       <label for ="Celular">Celular:</label>
       <input type="text" id="Celular" name="Celular"require value="<?php echo $Administrador["Celular"] ?>"><br>

       <label for ="FechaNacimiento">FechaNacimiento:</label>
       <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $Administrador["FechaNacimiento"] ?>"><br>

       <label for ="CorreoElectronico">CorreoElectronico:</label>
       <input type="email" id="CorreoElectronico" name="CorreoElectronico"require value="<?php echo $Administrador["CorreoElectronico"] ?>"><br>

       <label for ="Clave">Clave:</label>
       <input type="text" id="Clave" name="Clave"require value="<?php echo $Administrador["Clave"] ?>"><br>

       <input type="submit" value="Registrar">
       
</form>
</body>
</html>