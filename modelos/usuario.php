<?php  
    class usuario{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion){
            $this ->conexion = $conexion;
        }
        //metodo
        public function consulta(){
            $con="SELECT*FROM usuario ORDER BY  nombre";
            $res=mysqli_query($this->conexion,$con);
            $vec=[];

            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }
        public function eliminar($id){
            $del="DELETE FROM usuario WHERE id_usuario=$id";
            mysqli_query($this->conexion,$del);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="El usuario ha sido eliminada";
            return $vec;
        }
        public function insertar($params){
            $ins=" INSERT INTO usuario(ident,nombre,direccion,celular,email,rol,clave) VALUES ('$params->ident',
            '$params->nombre','$params->direccion','$params->celular','$params->email','$params->rol','$params->clave')";
            mysqli_query($this->conexion,$ins);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="El usuario ha sido insertada";
            return $vec;
        }
        public function editar($id, $params){  
            $editar = "UPDATE usuario SET ident='$params->ident',nombre='$params->nombre',direccion='$params->direccion',celular='$params->celular',email='$params->email',rol='$params->rol',clave='$params->clave' WHERE id_usuario=$id";
            mysqli_query($this -> conexion, $editar);
            $vec = [];
            $vec  ['resultado'] = "OK";
            $vec  ['mensaje'] = "El usuario ha sido editado";
            return  $vec;
        }
        public function filtro($valor){  
            $filtro = "SELECT * FROM  usuario WHERE nombre like '%$valor%'";
            $res =mysqli_query($this -> conexion, $filtro);
            $vec = [];
            while ($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }
?>