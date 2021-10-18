<?php

if (file_exists('controler/controler.mapa.php'))
{
    require 'controler/controler.mapa.php';
}else{
    require '../controler/controler.mapa.php';
}


if (file_exists('config/createJson.php'))
{
    require 'config/createJson.php';
}else{
    require '../config/createJson.php';
}

$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'PUT':
        $oC = new ControlerMapa();
        $json = createJson($oC->updateControlerMapa($json));
        echo json_encode($json);
        break;

    case 'GET':
        $oC = new ControlerMapa();
        $json = createJson($oC->readControlerMapa());
        echo json_encode($json);
        break;

    default :
        break;
}






?>