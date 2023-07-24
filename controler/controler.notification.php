<?php

if (file_exists('model/model.notification.php'))
{
    include_once 'model/model.notification.php';
}else{
    include_once '../model/model.notification.php';
}

class ControlerNotification
{
    function readControllerNotificationAll($tipo)
    {
        $result = cNotification::readModelNotificationAll($tipo);
        return $result;
    }

    function insertControlerNotificationEmail($datos)
    {
        $result = cNotification::insertNotificationEmail($datos['name'],$datos['html_content']);
        return $result;
    }

    function insertControlerNotificationWhatsApp($datos)
    {
        $result = cNotification::insertNotificationWhatsApp($datos['name'],$datos['texto']);
        return $result;
    }



}
?>
