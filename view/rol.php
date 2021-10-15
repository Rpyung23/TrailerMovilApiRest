<?php

if (file_exists('controler/controler.rol_empleado.php'))
{
    require 'controler/controler.rol_empleado.php';
}else{
    require '../controler/controler.rol_empleado.php';
}


if (file_exists('config/createJson.php'))
{
    require 'config/createJson.php';
}else{
    require '../config/createJson.php';
}


switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $oC = new ControlerRolEmpleado();
        $json = createJson($oC->readControlerRolEmpleado());
        echo json_encode($json);
        break;

    default :
        break;
}






?>