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
    
    ?>
    <br>
    <h1>REGISTRAR CLIENTE</h1>
    <form action="../controlador/ClienteControlador.php" method="post">
        
    <label for ="Identificacion">Identificacion:</label>
    <input type="text" id="Identificacion" name="Identificacion"require><br>

       <label for ="Nombre">Nombre:</label>
       <input type="text" id="Nombre" name="Nombre"require><br> 

       <label for="Apellido">Apellido:</label>
       <input type="text" id="Apellido" name="Apellido"require><br>

       <label for ="Direccion">Direccion:</label>
       <input type="text" id="Direccion" name="Direccion"><br>

       <label for ="Celular">Celular:</label>
       <input type="text" id="Celular" name="Celular"require><br>

       <label for ="FechaNacimiento">FechaNacimiento:</label>
       <input type="date" id="FechaNacimiento" name="FechaNacimiento"><br>

       <label for ="CorreoElectronico">CorreoElectronico:</label>
       <input type="email" id="CorreoElectronico" name="CorreoElectronico"require><br>

       <label for ="Clave">Clave:</label>
       <input type="text" id="Clave" name="Clave"require><br>

       <input type="submit" value="Registrar">
       
</form>
</body>
</html>