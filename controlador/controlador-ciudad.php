<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
    require_once("../conexion.php");
    require_once("../modelos/ciudad.php");

    $control=$_GET['control'];
    $ciu=new ciudad($conexion);

    switch($control){
        case 'ciudad':
            $id_dpto = $_GET['iddpto'];
            $vec=$ciu->consulta($id_dpto);
        break;
        case 'dpto':
            $vec=$ciu->consulta_dpto();
        break;
        
    }
    $datosj=json_encode($vec);
    echo $datosj;
    //header('Content-Type:application/json');
?>