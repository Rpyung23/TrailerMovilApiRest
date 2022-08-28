<?php
if (file_exists('controler/controler.clienteFactura.php'))
{
    include_once 'controler/controler.clienteFactura.php';
}else{
    include_once '../controler/controler.clienteFactura.php';
}

if (file_exists('config/createJson.php'))
{
    include_once 'config/createJson.php';
}else{
    include_once '../config/createJson.php';
}

$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $datos = ControllerClienteFactura::readClienteFactura($_GET['dni']);
        $json = createJson($datos);
        echo json_encode($json);
        break;
    case 'POST';
        break;
}

?>