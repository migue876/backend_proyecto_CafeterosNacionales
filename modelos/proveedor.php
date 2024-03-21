<?php
    class Proveedor{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con="SELECT pr.*, c.nombre AS ciudad FROM proveedor pr INNER JOIN ciudad c ON  pr.fo_ciudad=c.id_ciudad";
            $res=mysqli_query($this->conexion,$con);
            $vec=[];

            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }
        public function eliminar($id){
            $del="DELETE FROM proveedor WHERE id_prov=$id";
            mysqli_query($this->conexion,$del);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="El proveedor ha sido eliminado";
            return $vec;
        }
        public function insertar($params){
            $ins=" INSERT INTO proveedor(ident,nombre,direccion,celular,email,fo_ciudad)
            VALUES ('$params->ident','$params->nombre','$params->direccion','$params->celular','$params->email','$params->fo_ciudad')";
            mysqli_query($this->conexion,$ins);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="EL proveedor ha sido agregado";
            return $vec;
        }
        public function editar($id,$params){
            $editar="UPDATE proveedor SET ident='$params->ident',nombre='$params->nombre',direccion='$params->direccion',celular='$params->celular',email='$params->email',fo_ciudad='$params->fo_ciudad' WHERE id_prov=$id";
            mysqli_query($this->conexion,$editar);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="El proveedor ha sido editado";
            return $vec;
        }
        public function filtro($valor){
            $filtro = "SELECT * FROM  proveedor WHERE nombre like '%$valor%'";
            $res =mysqli_query($this -> conexion, $filtro);
            $vec = [];
            while ($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>