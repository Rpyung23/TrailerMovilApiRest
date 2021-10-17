<?php
if (file_exists('controler/controler.cliente.php'))
{
    include_once 'controler/controler.cliente.php';
}else{
    include_once '../controler/controler.cliente.php';
}

if (file_exists('config/createJson.php'))
{
    include_once 'config/createJson.php';
}else{
    include_once '../config/createJson.php';
}

$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        $oC = new ControlerCliente();
        $datos = $oC->insertControlerCliente($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'PUT':
        $oC = new ControlerCliente();
        $datos = $oC->updateControlerCliente($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oC = new ControlerCliente();
        $datos = $oC->readControlerCliente($json['email']);
        $json = createJson($datos);
        echo json_encode($json);
        break;

}

?>