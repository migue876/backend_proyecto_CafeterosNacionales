<?php
    class ciudad{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta($id_dpto){
            $con="SELECT c.*, d.nombre AS dpto 
            FROM ciudad c 
            INNER JOIN dpto d ON c.fo_dpto = d.id_dpto
            WHERE c.fo_dpto = $id_dpto
            ORDER BY  nombre";
            $res=mysqli_query($this->conexion,$con);
            $vec=[];

            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }

        public function consulta_dpto(){
            $con="SELECT * FROM dpto ORDER BY  nombre";
            $res=mysqli_query($this->conexion,$con);
            $vec=[];

            while($row=mysqli_fetch_array($res)){
                $vec[]=$row;
            }
            return $vec;
        }
        

    }
?>