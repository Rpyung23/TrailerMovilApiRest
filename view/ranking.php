<?php
if (file_exists('controler/controler.ranking.php'))
{
    include_once 'controler/controler.ranking.php';
}else{
    include_once '../controler/controler.ranking.php';
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
        $oM = new ControlerRanking();
        $datos = $oM->insertControlerRanking($json);
        $json = createJson($datos);
        echo json_encode($json);
        break;

    case 'GET':
        $oM = new ControlerRanking();
        $datos = $oM->readControlerNumStartRanking();
        $json = createJson($datos);
        echo json_encode($json);
        break;

}

?>