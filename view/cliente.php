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
        $json_send = null;
        $datos =null;
        if (strpos($_SERVER['REQUEST_URI'],'compra'))
        {
            $datos = $oC->insertControlerCompraWebcash($json);
        }else{
            $datos = $oC->insertControlerCliente($json);
        }
        $json_send = createJson($datos);
        echo json_encode($json_send);
        break;

    case 'PUT':
        $oC = new ControlerCliente();
        $datos = $oC->updateControlerCliente($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oC = new ControlerCliente();
        $datos = $oC->readControlerCliente($_GET['email']);
        $json = createJson($datos);
        echo json_encode($json);
        break;

}

?>
