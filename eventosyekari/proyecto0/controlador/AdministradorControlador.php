<?php

require_once('../modelo/administrador.php');


class AdministradorControlador {
//inicio funcion crear Administrador
    public function crearAdministrador ($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave){
        $Administrador = new Administrador();
        return $Administrador->create($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave);
    }
//fin funcion

//inicio funcion listar Administrador
    public function listarAdministrador() {
        $Administrador = new Administrador();
        return $Administrador->read(NULL);
    }
//fin funcion

//inicio funcion Consultar Administrador
    public function Consultaradministrador($Identificacion) {
        $Administrador = new Administrador();
        return $Administrador->read($Identificacion);
    }
//fin funcion

// Inicio funcion Actilizar Administrador
    public function actualizarAdministrador($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1){
    $Administrador = new Administrador();
    return $Administrador->update($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $Identificacion1);
    }
//fin funcion

//Inicio funcion actualizar Administrador
public function eliminarAdministrador($Identificacion){
    $Administrador = new Administrador();
    return $Administrador->delete($Identificacion);
}


}


if (isset($_POST["Identificacion"]) and !isset ($_POST["Accion"])){
    // crear administrador
    $Identificacion = $_POST["Identificacion"];
    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $CargaEmpresarial = $_POST["CargaEmpresarial"];
    $Direccion = $_POST["Direccion"];
    $Celular = $_POST["Celular"];
    $FechaNacimiento = $_POST["FechaNacimiento"];
    $CorreoElectronico = $_POST["CorreoElectronico"];
    $Clave = $_POST["Clave"];

    // DEBUG: registrar los datos recibidos temporalmente para diagnosticar por qué
    // se están guardando números en lugar del nombre en algunos entornos.
    // El archivo se crea en la misma carpeta controlador; eliminar después de usar.
    try {
        $debugPath = __DIR__ . '/admin_create_debug.log';
        $log = date('Y-m-d H:i:s') . " " . json_encode(array(
            'Identificacion' => $Identificacion,
            'Nombre' => $Nombre,
            'Apellido' => $Apellido,
            'CargaEmpresarial' => $CargaEmpresarial,
            'Direccion' => $Direccion,
            'Celular' => $Celular,
            'FechaNacimiento' => $FechaNacimiento,
            'CorreoElectronico' => $CorreoElectronico,
            'Clave' => strlen($Clave) > 0 ? '***' : ''
        ), JSON_UNESCAPED_UNICODE) . PHP_EOL;
        file_put_contents($debugPath, $log, FILE_APPEND | LOCK_EX);
    } catch (Exception $e) {
        // no bloquear ejecución si falla el log
    }

    $AdministradorControlador = new AdministradorControlador();
    try {
        $Administradores = $AdministradorControlador->crearAdministrador($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave);
        $Mensaje = "Registrado";
    } catch (PDOException $e) {
        $Mensaje = "error al registar el administrador: " . $e->getMessage();
    }

    // redirigir al origen si se pasó un redirect, si no, usar la lista por defecto
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '../vista/Administrador_listar.php';
    $sep = (strpos($redirect, '?') === false) ? '?' : '&';
    header('Location: ' . $redirect . $sep . 'm=' . urlencode($Mensaje));

} // cierre crear


else if (isset($_POST["Identificacion"]) and $_POST["Accion"]== "Eliminar" ){
    $Identificacion = $_POST["Identificacion"];
    $AdministradorControlador = new AdministradorControlador();
    $Administradores = $AdministradorControlador->eliminarAdministrador($Identificacion);
    $Mensaje = 'Eliminado';
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '../vista/Administrador_listar.php';
    $sep = (strpos($redirect, '?') === false) ? '?' : '&';
    header('Location: ' . $redirect . $sep . 'm=' . urlencode($Mensaje));
    
}
else if (isset($_POST["Identificacion"]) and $_POST["Accion"]=="Actualizar" and isset ($_POST["Identificacion1"])){
    // actualizar administrador
    $Identificacion = $_POST["Identificacion"];
    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $CargaEmpresarial = $_POST["CargaEmpresarial"];
    $Direccion = $_POST["Direccion"];
    $Celular = $_POST["Celular"];
    $FechaNacimiento = $_POST["FechaNacimiento"];
    $CorreoElectronico = $_POST["CorreoElectronico"];
    $Clave = $_POST["Clave"];

    $AdministradorControlador = new AdministradorControlador();
    $Administradores = $AdministradorControlador->actualizarAdministrador ($Identificacion, $Nombre, $Apellido, $CargaEmpresarial, $Direccion, $Celular, $FechaNacimiento, $CorreoElectronico, $Clave, $_POST ["Identificacion1"]);
    $Mensaje = 'Actualizado';
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '../vista/Administrador_listar.php';
    $sep = (strpos($redirect, '?') === false) ? '?' : '&';
    header('Location: ' . $redirect . $sep . 'm=' . urlencode($Mensaje));

}
?>