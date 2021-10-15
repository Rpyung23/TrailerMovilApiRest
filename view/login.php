<?php
if (file_exists('controler/controler.empleado.php'))
{
    require 'controler/controler.empleado.php';
}else{
    require '../controler/controler.empleado.php';
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
    case 'GET':
        $oE = new ControlerEmpleado();
        $datos = $oE->loginControlerEmpleado($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;
}

?>