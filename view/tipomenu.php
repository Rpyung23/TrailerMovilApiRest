<?php
if (file_exists('controler/controler.tipo_menu.php'))
{
    include_once 'controler/controler.tipo_menu.php';
}else{
    include_once '../controler/controler.tipo_menu.php';
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
    /*case 'POST':
        $oM = new ControlerMenu();
        $datos = $oM->insertControlerMenu($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'PUT':
        $oC = new ControlerMenu();
        $datos = $oC->updateControlerMenu($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;*/

    case 'GET':
        $oM = new ControlerTipoMenu();
        $datos = $oM->readControlerTipoMenu();
        $json = createJson($datos);
        echo json_encode($json);
        break;

    /*case 'DELETE':
        $oM = new ControlerMenu();
        $datos = $oM->deleteControlerMenu($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;*/

}

?>