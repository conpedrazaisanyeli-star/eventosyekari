<?php
session_start();
require_once('db.php'); // $conn

$accion = isset($_GET['accion']) ? $_GET['accion'] : (isset($_POST['accion']) ? $_POST['accion'] : 'listar');
$redirect = isset($_POST['redirect']) ? $_POST['redirect'] : (isset($_GET['redirect']) ? $_GET['redirect'] : '../vista/dashboard_admin.php?page=services');

switch($accion){
    case 'crear':
        // Campos básicos
        $codigo = isset($_POST['codigo']) ? trim($_POST['codigo']) : '';
        $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
        $duracion = isset($_POST['duracion']) ? trim($_POST['duracion']) : '';
        $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
        $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';

        // Procesar imagen si se subió
        $imagenName = null;
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
            $file = $_FILES['imagen'];
            $allowed = ['jpg','jpeg','png','gif'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if(in_array($ext, $allowed)){
                $safe = preg_replace('/[^a-zA-Z0-9-_\.]/','', basename($file['name']));
                $imagenName = time() . '_' . bin2hex(random_bytes(4)) . '_' . $safe;
                $target = __DIR__ . '/../public/img/' . $imagenName;
                if(!move_uploaded_file($file['tmp_name'], $target)){
                    $imagenName = null; // falló
                }
            }
        }

        try{
            $stmt = $conn->prepare("INSERT INTO servicios (codigo, titulo, imagen, duracion, precio, descripcion) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$codigo, $titulo, $imagenName, $duracion, $precio, $descripcion]);
            header('Location: ' . $redirect . '&m=Servicio+creado');
            exit;
        }catch(Exception $e){
            header('Location: ' . $redirect . '&m=Error+creando+servicio');
            exit;
        }

    case 'actualizar':
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if($id <= 0){ header('Location: ' . $redirect . '&m=ID+inválido'); exit; }
        $codigo = isset($_POST['codigo']) ? trim($_POST['codigo']) : '';
        $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
        $duracion = isset($_POST['duracion']) ? trim($_POST['duracion']) : '';
        $precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;
        $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';

        // obtener imagen actual
        $stmt = $conn->prepare("SELECT imagen FROM servicios WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $currentImage = $row ? $row['imagen'] : null;

        // procesar nueva imagen
        $imagenName = $currentImage;
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
            $file = $_FILES['imagen'];
            $allowed = ['jpg','jpeg','png','gif'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if(in_array($ext, $allowed)){
                $safe = preg_replace('/[^a-zA-Z0-9-_\.]/','', basename($file['name']));
                $imagenName = time() . '_' . bin2hex(random_bytes(4)) . '_' . $safe;
                $target = __DIR__ . '/../public/img/' . $imagenName;
                if(move_uploaded_file($file['tmp_name'], $target)){
                    // borrar anterior si existía
                    if(!empty($currentImage) && file_exists(__DIR__ . '/../public/img/' . $currentImage)){
                        @unlink(__DIR__ . '/../public/img/' . $currentImage);
                    }
                } else {
                    $imagenName = $currentImage; // si falla, mantener la anterior
                }
            }
        }

        try{
            $stmt = $conn->prepare("UPDATE servicios SET codigo = ?, titulo = ?, imagen = ?, duracion = ?, precio = ?, descripcion = ? WHERE id = ?");
            $stmt->execute([$codigo, $titulo, $imagenName, $duracion, $precio, $descripcion, $id]);
            header('Location: ' . $redirect . '&m=Servicio+actualizado');
            exit;
        }catch(Exception $e){
            header('Location: ' . $redirect . '&m=Error+actualizando+servicio');
            exit;
        }

    case 'eliminar':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if($id <= 0){ header('Location: ' . $redirect . '&m=ID+inválido'); exit; }
        try{
            // obtener imagen
            $stmt = $conn->prepare("SELECT imagen FROM servicios WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row && !empty($row['imagen']) && file_exists(__DIR__ . '/../public/img/' . $row['imagen'])){
                @unlink(__DIR__ . '/../public/img/' . $row['imagen']);
            }
            $stmt = $conn->prepare("DELETE FROM servicios WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: ' . $redirect . '&m=Servicio+eliminado');
            exit;
        }catch(Exception $e){
            header('Location: ' . $redirect . '&m=Error+eliminando+servicio');
            exit;
        }

    case 'listar':
    default:
        header('Location: ../vista/dashboard_admin.php?page=services');
        exit;
}

?>
