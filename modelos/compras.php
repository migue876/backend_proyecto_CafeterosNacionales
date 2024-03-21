<?php
    class Compras{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con="SELECT*FROM compras INNER JOIN proveedor ON compras.fo_proveedor=proveedor.id_prov
            INNER JOIN usuario ON compras.fo_usuario=usuario.id_usuario";
            $res=mysqli_query($this->conexion,$con);
            $vec=[];

            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }
        public function eliminar($id){
            $del="DELETE FROM compras WHERE id_compras=$id";
            mysqli_query($this->conexion,$del);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="La compra ha sido eliminada ha sido eliminada";
            return $vec;
        }
        public function insertar($params){
            $ins=" INSERT INTO compras(fecha,fo_proveedor,productos,subtotal,total,fo_usuario)
            VALUES ('$params->fecha','$params->fo_proveedor','$params->productos','$params->subtotal','$params->total','$params->fo_usuario')";
            mysqli_query($this->conexion,$ins);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="La compra ha sido insertada";
            return $vec;
        }
        public function editar($id,$params){
            $editar="UPDATE compras SET fecha='$params->fecha',fo_proveedor='$params->fo_proveedor',productos='$params->productos',subtotal='$params->subtotal',total='$params->total',fo_usuario='$params->fo_usuario' WHERE id_compras=$id";
            mysqli_query($this->conexion,$editar);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="La compra ha sido editado";
            return $vec;
        }
        public function filtro($valor){
            $filtro ="SELECT * FROM  compras WHERE productos like '%$valor%'";
            $res =mysqli_query($this->conexion,$filtro);
            $vec =[];
            while ($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>