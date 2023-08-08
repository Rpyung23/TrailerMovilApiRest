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
        $datos = $oM->readControllerTicketEvento($json['eventos']);
        //var_dump($datos);
        $json = createJson($datos);
        echo json_encode($json);
        break;
}

?>
