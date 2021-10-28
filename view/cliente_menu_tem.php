<?php
if (file_exists('controler/controler.cliente_menu_tem.php'))
{
    include_once 'controler/controler.cliente_menu_tem.php';
}else{
    include_once '../controler/controler.cliente_menu_tem.php';
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
        $oC = new ControlerClienteMenuTemp();
        $datos = $oC->insertControlerClienteMenuTem($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oC = new ControlerClienteMenuTemp();
        $email = $_GET['email'];
        $datos = $oC->readControlerClienteMenuTemp($email);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'DELETE':
        $oC = new ControlerClienteMenuTemp();
        $datos = $oC->deleteControlerClienteMenuTemp($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

}

?>
