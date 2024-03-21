<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
    require_once("../conexion.php");
    require_once("../modelos/compras.php");

    $control=$_GET['control'];
    $compras=new Compras($conexion);

    switch($control){
        case 'consulta':
            $vec=$compras->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            $json='{"fecha":"2000/06/14","fo_proveedor":1,"productos":"aguacate","subtotal":"80000","total":"80100","fo_usuario":1}';
            $params=json_decode($json);
            $vec=$compras->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec=$compras->eliminar($id);
        break;
        case 'editar':
            $json=file_get_contents('php://input');
            $json='{"fecha":"2000/06/14","fo_proveedor":1,"productos":"aguacate","subtotal":"80000","total":"80100","fo_usuario":1}';
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec=$compras->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$compras->filtro($dato);
        break;
    }
    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type:application/json');
?>