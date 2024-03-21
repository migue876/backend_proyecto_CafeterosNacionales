<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
    require_once("../conexion.php");
    require_once("../modelos/proveedor.php");

    $control=$_GET['control'];
    $prove=new Proveedor($conexion);

    switch($control){
        case 'consulta':
            $vec=$prove->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            //$json='{"ident":"1234","nombre":"william","direccion":"parque","celular":"3122564","email":"dos@gmail.com","fo_ciudad":1}';
            $params=json_decode($json);
            $vec=$prove->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec=$prove->eliminar($id);
        break;
        case 'editar':
            $json=file_get_contents('php://input');
            //$json='{"ident":"1234","nombre":"Miguel","direccion":"parque","celular":"3122564","email":"dos@gmail.com","fo_ciudad":1}';
            $params=json_decode($json);
            $id = $_GET['id'];
            $vec=$prove->editar($id,$params);
        break;
        case 'filtro';
            $dato = $_GET['dato'];
            $vec=$prove->filtro($dato);
        break;
    }
    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type:application/json');
?>