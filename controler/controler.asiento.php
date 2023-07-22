<?php
if (file_exists('model/model.asientos.php'))
{
    include_once 'model/model.asientos.php';
}else{
    include_once '../model/model.asientos.php';
}

class cControllerAsiento
{
    function readControllerAsientos()
    {
        $datos = [];
        $datos = cAsiento::readModelAsientos();
        return $datos;
    }
}



?>