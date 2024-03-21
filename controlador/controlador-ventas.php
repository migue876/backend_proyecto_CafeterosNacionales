<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept");
    require_once("../conexion.php");
    require_once("../modelos/ventas.php");


    $control = $_GET['control'];

    $ven = new ventas($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $ven->consulta();
            $datosj = json_encode($vec);
            echo $datosj;
        break;
        case 'insertar':
            $json = file_get_contents('php://input');
            /*$json = '{
                "fecha": "2024-2-28",
                "fo_cliente": 1,
                "productos": [
                  [
                    "001",
                    "Balón",
                    5600,
                    2,
                    11200
                  ],
                  [
                    "007",
                    "tenis",
                    12000,
                    5,
                    60000
                  ]
                ],
                "subtotal": 71200,
                "total": 71200,
                "fo_vendedor": 1
              }'; //para hacer pruebas datos directos*/
            $params = json_decode($json);
            $texto_arreglo = serialize($params->productos);//convertir datos a texto
            $params->productos = $texto_arreglo;
            $vec = $ven->insertar($params);
            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;
        case 'productos':
            $id = $_GET['id'];
            $vec = $ven->consultap($id);
            //$vec = $pedido->insertar($params);
            $datosj = json_encode($vec);
            echo $datosj;
            header('Content-Type: application/json');
        break;
    }
?>
