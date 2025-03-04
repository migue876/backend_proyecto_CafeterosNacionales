<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
    require_once("../conexion.php");
    require_once("../modelos/cliente.php");

    $control=$_GET['control'];
    $cliente=new Cliente($conexion);

    switch($control){
        case 'consulta':
            $vec=$cliente->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            //$json='{"ident":"123","nombre":"Camilo","direccion":"jardin 1","celular":"320797","email":"uno@gmail.com","fo_ciudad":1}';
            $params=json_decode($json);
            $vec=$cliente->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec=$cliente->eliminar($id);
        break;
        case 'editar':
            $json=file_get_contents('php://input');
            //$json='{"ident":"123","nombre":"Andres","direccion":"jardin 1","celular":"320797","email":"uno@gmail.com","fo_ciudad":1}';
            $params=json_decode($json);
            $id=$_GET['id'];
            $vec=$cliente->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['dato'];
            $vec=$cliente->filtro($dato);
        break;
        case 'ccliente':
            $dato=$_GET['dato'];
            $vec=$cliente->consulta_cliente($dato);
        break;
    }
    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type:application/json');
?>