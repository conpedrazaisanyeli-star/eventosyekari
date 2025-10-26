<?php
session_start();
require_once('db.php'); // $conn disponible

$accion = isset($_GET['accion']) ? $_GET['accion'] : (isset($_POST['accion']) ? $_POST['accion'] : 'listar');

switch($accion){
    case 'agregar':
        $id = isset($_POST['id']) ? intval($_POST['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
        $cantidad = isset($_POST['cantidad']) ? max(1,intval($_POST['cantidad'])) : 1;
        if($id>0){
            $stmt = $conn->prepare("SELECT id, titulo, precio FROM servicios WHERE id = ?");
            $stmt->execute([$id]);
            $serv = $stmt->fetch(PDO::FETCH_ASSOC);
            if($serv){
                if(!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];
                $found = false;
                for($i=0;$i<count($_SESSION['carrito']);$i++){
                    if($_SESSION['carrito'][$i]['id'] == $serv['id']){
                        $_SESSION['carrito'][$i]['cantidad'] += $cantidad;
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    $_SESSION['carrito'][] = [
                        'id' => $serv['id'],
                        'titulo' => $serv['titulo'],
                        'precio' => $serv['precio'],
                        'cantidad' => $cantidad
                    ];
                }
            }
        }
        header('Location: ../vista/catalogo.php');
        exit;

    case 'eliminar':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if($id>0 && isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $k => $it){
                if($it['id'] == $id){
                    unset($_SESSION['carrito'][$k]);
                    break;
                }
            }
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        }
        header('Location: ../vista/Carrito_listar.php');
        exit;

    case 'vaciar':
        unset($_SESSION['carrito']);
        header('Location: ../vista/Carrito_listar.php');
        exit;

    case 'pagar':
        if(!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0){
            header('Location: ../vista/Carrito_listar.php?m=vacío');
            exit;
        }
        // Validación server-side: todos los campos del formulario deben estar presentes
        // If client is logged in, enforce using session identification
        if (isset($_SESSION['ClienteIdentificacion']) && !empty($_SESSION['ClienteIdentificacion'])) {
            $cliente_identificacion = trim($_SESSION['ClienteIdentificacion']);
        } else {
            $cliente_identificacion = isset($_POST['cliente_identificacion']) ? trim($_POST['cliente_identificacion']) : '';
        }
        $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';
        $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';
        $fecha_evento = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
        $hora_evento = isset($_POST['hora']) ? trim($_POST['hora']) : '';
        // If no client id available, require login
        if ($cliente_identificacion === '') {
            header('Location: ../vista/login.php?m=' . urlencode('Debes iniciar sesión para pagar'));
            exit;
        }

        if ($direccion === '' || $telefono === '' || $fecha_evento === '' || $hora_evento === '') {
            // Falta algún campo obligatorio: redirigir y mostrar mensaje
            header('Location: ../vista/Carrito_listar.php?m=Por+favor+complete+todos+los+campos');
            exit;
        }

        try{
            $conn->beginTransaction();
            $total = 0;
            foreach($_SESSION['carrito'] as $it) $total += $it['precio'] * $it['cantidad'];

            // Insertar orden con los campos validados
            $stmt = $conn->prepare("INSERT INTO ordenes (cliente_identificacion, total, direccion, telefono, fecha_evento, hora_evento) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$cliente_identificacion, $total, $direccion, $telefono, $fecha_evento, $hora_evento]);
            $orden_id = $conn->lastInsertId();
            $stmtItem = $conn->prepare("INSERT INTO orden_items (orden_id, servicio_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
            foreach($_SESSION['carrito'] as $it){
                $stmtItem->execute([$orden_id, $it['id'], $it['cantidad'], $it['precio']]);
            }
            $conn->commit();
            unset($_SESSION['carrito']);
            header('Location: ../vista/Carrito_listar.php?m=pagado');
            exit;
        }catch(Exception $e){
            if($conn->inTransaction()) $conn->rollBack();
            header('Location: ../vista/Carrito_listar.php?m=error');
            exit;
        }

    case 'listar':
    default:
        header('Location: ../vista/Carrito_listar.php');
        exit;
}

?>