<?php  
    class cliente{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion){
            $this ->conexion=$conexion;
        }
        //metodo
        public function consulta(){
            $con="SELECT cl.*, c.nombre AS ciudad FROM cliente cl INNER JOIN ciudad c ON cl.fo_ciudad=c.id_ciudad";
            $res=mysqli_query($this-> conexion, $con);
            $vec=[];
            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }
        public function eliminar($id){
            $del="DELETE FROM cliente WHERE id_cliente=$id";
            mysqli_query($this->conexion,$del);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="La categoria ha sido eliminada";
            return $vec;
        }
        public function insertar($params){
            $ins="INSERT INTO cliente(ident,nombre,direccion,celular,email,fo_ciudad)
            VALUES ('$params->ident','$params->nombre','$params->direccion','$params->celular','$params->email','$params->fo_ciudad')";
            mysqli_query($this->conexion,$ins);
            $vec=[];
            $vec['resultado']="OK";
            $vec['mensaje']="EL cliente ha sido insertadao";
            return $vec;
        }
        public function editar($id, $params){
            $editar = "UPDATE cliente SET ident='$params->ident',nombre='$params->nombre',direccion='$params->direccion',celular='$params->celular',email='$params->email',fo_ciudad='$params->fo_ciudad' WHERE id_cliente = $id ";
            mysqli_query($this -> conexion, $editar);
            $vec = [];
            $vec  ['resultado'] = "OK";
            $vec  ['mensaje'] = "El cliente ha sido editado";
            return  $vec;
        }
        public function filtro($dato){
            $con ="SELECT c.*,ci.nombre AS ciudad,d.nombre AS dpto
            FROM cliente c
            INNER JOIN ciudad ci ON c.fo_ciudad=ci.id_ciudad
            INNER JOIN dpto d ON ci.fo_dpto=d.id_dpto
            WHERE c.ident LIKE '%$dato%' OR c.nombre LIKE '%$dato%' OR c.email LIKE '%$dato%'
            ORDER BY c.nombre";
            $res =mysqli_query($this->conexion,$con);
            $vec =[];
            while ($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        public function consulta_cliente($dato){
            $con ="SELECT c.*,ci.nombre AS ciudad,d.nombre AS dpto
            FROM cliente c
            INNER JOIN ciudad ci ON c.fo_ciudad=ci.id_ciudad
            INNER JOIN dpto d ON ci.fo_dpto=d.id_dpto
            WHERE c.ident = '$dato'
            ORDER BY c.nombre";
            $res =mysqli_query($this->conexion,$con);
            $vec =[];
            while ($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
    }

?>