<?php
if (file_exists('controler/controler.notification.php'))
{
    include_once 'controler/controler.notification.php';
}else{
    include_once '../controler/controler.notification.php';
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

    case 'GET':
        $oN = new ControlerNotification();
        $datos = null;

        // tipo  -> 1 (whatsapp) 2 (gmail)

        $datos = $oN->readControllerNotificationAll($_GET["tipo"]);

        $json = createJson($datos);

        //var_dump($json);
        echo json_encode($json);
        break;

    case 'POST':
        $oC = new ControlerNotification();
        $json_send = null;
        $datos =null;
        if (strpos($_SERVER['REQUEST_URI'],'email'))
        {
            $datos = $oC->insertControlerNotificationEmail($json);
        }else{
            $datos = $oC->insertControlerNotificationWhatsApp($json);
        }
        $json_send = createJson($datos);
        echo json_encode($json_send);
        break;



    
    
}


?>
