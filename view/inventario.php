<?php
if (file_exists('controler/controler.inventario.php'))
{
    include_once 'controler/controler.inventario.php';
}else{
    include_once '../controler/controler.inventario.php';
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
        $oM = new ControlerInventario();
        $datos = $oM->insertControlerInvario($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oM = new ControlerInventario();
        $datos = $oM->readControlerInventario();
        $json = createJson($datos);
        echo json_encode($json);
        break;


}

?>