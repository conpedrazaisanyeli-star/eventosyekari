<?php
session_start();
session_unset(); //elimina todas las variables de sesion
session_destroy(); //destruye la sesion 
header("Location: ../index.php?m=Sesion cerrada");
exit();
