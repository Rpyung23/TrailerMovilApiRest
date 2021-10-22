<?php
if (file_exists('controler/controler.evento.php'))
{
    include_once 'controler/controler.evento.php';
}else{
    include_once '../controler/controler.evento.php';
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
        $oM = new ControlerEvento();
        $datos = $oM->insertControlerEvento($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'PUT':
        $oC = new ControlerEvento();
        $datos = $oC->updateControlerEvento($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oM = new ControlerEvento();
        $estado = $_GET['estado'];
        $datos = $oM->readControlerEvento($estado);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'DELETE':
        $oM = new ControlerEvento();
        $datos = $oM->deleteControlerEvento($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

}

?>