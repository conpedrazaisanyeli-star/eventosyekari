<?php
//namespace Modelo;

//use Config/Database;
require_once("../controlador/db.php");
class agendaservicio {
    private $conexion;

    public function __construct(){
        $database = new Database();
        $this->conexion = $database->getConnect();
    }

    /*private function otra(){

    }*/
    
    public function create($CodigoServicio, $Identificacion, $Hora, $Dia){
        
        $sql="Insert into agendaservicio(CodigoServicio, Identificacion, Hora, Dia) values(:CodigoServicio, :Identificacion, :Hora, :Dia)";
        $stmt=$this->conexion->prepare($sql);
        $stmt->bindParam(':CodigoServicio',$CodigoServicio);
        $stmt->bindParam(':Identificacion',$Identificacion);
        $stmt->bindParam(':Hora',$Hora);
        $stmt->bindParam(':Dia',$Dia);
        echo $sql;
        return $stmt->execute();

    }//Fin funcion crear

    public function read($CodigoServicio, $Identificacion)
    {
        if($CodigoServicio!=NULL and $Identificacion!=NULL) {
            $sql="Select * from agendaservicio where CodigoServicio=".$CodigoServicio." and Identificacion=".$Identificacion;
        }
        else {
            $sql="Select ca.CodigoServicio as CodigoServicio, ca.Identificacion as Identificacion, ca.Hora as Hora, ca.Dia as Dia from agendaservicio ca, Administrador d, Servicio m where ca.Identificacion=d.Identificacion and m.CodigoServicio=ca.CodigoServicio";
            }
        $stmt=$this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($CodigoServicio, $Identificacion, $CodigoServicio1){
        $sql="update agendaservicio set CodigoServicio=:CodigoServicio, Identificacion=:Identificacion, Hora=:Hora, Dia=:Dia where CodigoServicio=:CodigoServicio1 and Identificacion=:Identificacion1";
        $stmt=$this->conexion->prepare($sql);
        $stmt->bindParam(':CodigoServicio',$CodigoServicio);
        $stmt->bindParam(':Identificacion',$Identificacion);
        $stmt->bindParam(':Hora',$Hora);
        $stmt->bindParam(':Dia',$Dia);
        $stmt->bindParam(':CodigoServicio1',$CodigoServicio1);
        $stmt->bindParam(':Identificacion1',$Identificacion1);
        //echo $sql;
        return $stmt->execute();
    }

    public function delete($CodigoServicio, $Identificacion, $Hora, $Dia){
        $sql="delete from Agendaservicio where CodigoServicio=:CodigoServicio and Identificacion=:Identificacion and Dia=:Dia and Hora=:Hora";
        $stmt=$this->conexion->prepare($sql);
        $stmt->bindParam(':CodigoServicio',$CodigoServicio);
        $stmt->bindParam(':Identificacion',$Identificacion);
        $stmt->bindParam(':Hora',$Hora);
        $stmt->bindParam(':Dia',$Dia);
        return $stmt->execute();
    }

}
/* INICIO DE COMENTARIO
CRUD
C -> CREAR -> CREATE        -> INSERT
R -> LEER (Listar) -> READ  -> SELECT
U -> ACTUALIZAR -> UPDATE   -> UPDATE
D -> ELIMINAR -> DELETE     -> DELETE

FIN DEL COMENTARIO */
// COMENTARIO DE UNA LINEA

?>

<!-- Comentario HTML -->