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
    case 'POST':
        $oE = new ControlerEmpleado();
        $datos = $oE->insertControlerEmpleado($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $uri = $_SERVER["REQUEST_URI"];
        $oE = new ControlerEmpleado();
        if (strpos($uri,"activos"))
        {
            $datos = $oE->readControlerEmpleadoActivos();
        }else{
            $datos = $oE->readControlerEmpleado();
        }
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'PUT':
        $oE = new ControlerEmpleado();
        $datos = $oE->updateControlerEmpleado($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'DELETE':
        $oE = new ControlerEmpleado();
        $datos = $oE->deleteControlerEmpleado($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;


}

?>
